angular.module("inline_table", [])

.controller("inline_table_controller", ($scope, $http) => {

    $scope.fetchData = () => {
        $http({
            method: "GET",
            url: "routes?InlineTableGetData"
        }).then( (data) => {
            $scope.namesArray = data.data.data;
        });
    };

    $scope.formData = {};

    $scope.getTemplate = (data) => {
        if(data.id == $scope.formData.id) {
            return 'edit';
        } else {
            return 'display';
        }
    };

    $scope.addData = {};

    $scope.success = false;

    $scope.insertData = () => {
        // console.log($scope.addData);
        $http({
            method: "POST",
            url: "routes?InlineTableInsertData",
            data: $scope.addData
        }).then( (data) => {
            // console.log(data.data.data);
            $scope.success = true;
            ( typeof data.data.data !== 'undefined' ) ? $scope.successMessage = data.data.data : $scope.successMessage = data.data;
            $scope.fetchData();
            $scope.addData = {};
        });
    };

    $scope.editInfo = (data) => {
        $scope.formData = angular.copy(data);
    };

    $scope.reset = () => {
        $scope.formData = {};
    };

    $scope.editData = () => {
        $http({
            method: "POST",
            url: "routes?InlineTableUpdateData",
            data: $scope.formData
        }).then( (data) => {
            $scope.success = true;
            ( typeof data.data.data !== 'undefined' ) ? $scope.successMessage = data.data.data : $scope.successMessage = data.data;
            $scope.fetchData();
            $scope.formData = {};
        });
    };

    $scope.deleteInfo = (id) => {
        $http({
            method: "POST",
            url: "routes?InlineTableDeleteData",
            data: {
                id: id
            }
        }).then( (data) => {
            $scope.success = true;
            ( typeof data.data.data !== 'undefined' ) ? $scope.successMessage = data.data.data : $scope.successMessage = data.data;
            $scope.fetchData();
        });
    };

});