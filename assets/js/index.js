angular.module('crudApp', [])

.controller('crudController', ($scope, $http) => {

    $scope.success = false;
    $scope.error = false;

    $scope.fetchData = () => {
        $http({
            type: 'GET',
            url: 'routes?SelectAllInfo'
        }).then( (data) => {
            $scope.namesData = data.data;
        }, (error) => {
            console.log(error);
        });
    };

    $scope.openModal = () => {
        var modal_popup = angular.element('#crudModal');
        modal_popup.modal('show');
    };

    $scope.closeModal = () => {
        var modal_popup = angular.element('#crudModal');
        modal_popup.modal('hide');
    };

    $scope.addData = () => {
        $scope.first_name = "";
        $scope.last_name = "";
        $scope.modalTitle = "Add Data";
        $scope.submit_button = "Insert";
        $scope.openModal();
    };

    $scope.submitForm = () => {
        $http({
            method: "POST",
            url: "routes?InsertInfo",
            data: {
                firstname: $scope.first_name,
                lastname: $scope.last_name,
                action: ($scope.submit_button).toUpperCase(),
                submit_button: $scope.submit_button,
                id: $scope.hidden_id
            }
        }).then( (data) => {
            if(data.data.error != '') {
                $scope.success = false;
                $scope.error = true;
                $scope.errorMessage = data.data.error;
            } else {
                $scope.success = true;
                $scope.error = false;
                $scope.successMessage = data.data.message;
                $scope.form_data = {};
                $scope.closeModal();
                $scope.fetchData();
            }
        });
    };

    $scope.editInfo = (id) => {
        $http({
            method: "POST",
            url: "routes?InsertInfo",
            data: {
                id: id,
                action: 'GET_DATA',
            }
        }).then( (data) => {
            console.log(data.data.data[0]);
            $scope.first_name = data.data.data[0].firstname;
            $scope.last_name = data.data.data[0].lastname;
            $scope.hidden_id = data.data.data[0].id;
            $scope.modalTitle = "Edit Data";
            $scope.submit_button = "Update";
            $scope.openModal();
        });
    };

    $scope.deleteInfo = (id) => {

        if(confirm("Are you sure you want to delete it?")) {
            $http({
                method: "POST",
                url: "routes?DeleteInfo",
                data: {
                    id: id
                }
            }).then( (data) =>  {
                if (data.data.message == 'Data Deleted') {
                    $scope.fetchData();
                    $scope.successMessage = data.data.message;
                    $scope.success = true;
                    $scope.error = false;
                } else {
                    $scope.successMessage = data.data.message;
                    $scope.success = false;
                    $scope.error = true;
                }
                
            });
        }
        
    };

});