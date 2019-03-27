<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    
    <script src="assets/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-data-table/0.7.1/dataTable.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    
    <div class="container" ng-app="inline_table" ng-controller="inline_table_controller">

        <br>

        <h3 align="center">
            Inline Table Add Edit Delete using AngularJS in PHP MySQL
        </h3>

        <br>

        <div class="responsive" ng-init="fetchData()">

            <div class="alert alert-success alert-dismissable" ng-show="success">
                <a href="#" class="close" data-dismiss="alert" ng-click="closeMsg()" aria-label="close">&times;</a>
                {{ successMessage }}
            </div>

            <form name="testForm" ng-submit="insertData()">

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="text" class="form-control" ng-model="addData.first_name" placeholder="Enter Firstname" ng-required="true">
                            </td>
                            <td>
                                <input type="text" class="form-control" ng-model="addData.last_name" placeholder="Enter Lastname" ng-required="true">
                            </td>
                            <td>
                                <button class="btn btn-success" ng-disabled="testForm.$invalid">Save</button>
                            </td>
                        </tr>
                        <tr ng-repeat="data in namesArray" ng-include="getTemplate(data)">
                            
                        </tr>
                    </tbody>
                </table>

            </form>

            <script type="text/ng-template" id="display">
                <td>{{ data.firstname }}</td>
                <td>{{ data.lastname }}</td>
                <td>
                    <button type="button" class="btn btn-info" ng-click="editInfo(data)">Edit</button>
                    <button type="button" class="btn btn-danger" ng-click="deleteInfo(data.id)">Delete</button> 
                </td>
            </script>

            <script type="text/ng-template" id="edit">
                <td>
                    <input type="text" class="form-control" ng-model="formData.firstname">
                </td>
                <td>
                    <input type="text" class="form-control" ng-model="formData.lastname">
                </td>
                <td>
                    <input type="hidden" ng-model="formData.id">
                    <button type="button" class="btn btn-success" ng-click="editData()">Save</button>
                    <button type="button" class="btn btn-warning" ng-click="reset()">Cancel</button>    
                </td>
            </script>

            
        </div>

    </div>

    <script src="assets/js/indexInlineTable.js"></script>

</body>
</html>