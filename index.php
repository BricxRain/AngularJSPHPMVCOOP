<!DOCTYPE html>
<html lang="en" ng-app="crudApp">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-data-table/0.7.1/dataTable.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body ng-controller="crudController">

    <div class="container">
        <br>
            <h3 align="center">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
            </h3>
        <br>

        <div class="alert alert-success" role="alert" ng-show="success">
            {{ successMessage }}
        </div>

        <div align="right">
            <button class="btn btn-success" name="add_button" type="button" ng-click="addData()">
                Add
            </button>
        </div>

        <br>

        <div class="table-responsive" style="overflow-x: unset;" ng-init="fetchData()">
            <table class="table table-bordered table-striped datatable">
                <thead>
                    <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="name in namesData">
                        <td>{{ name.firstname }}</td>
                        <td>{{ name.lastname }}</td>
                        <td>
                            <button class="btn btn-info editInfo" ng-click="editInfo(name.id)">Edit</button>
                            <button class="btn btn-danger" ng-click="deleteInfo(name.id)">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

    <div class="modal" tabindex="-1" role="dialog" id="crudModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <!-- <form action="" method="post" ng-submit="submitForm()"> -->

                    <div class="modal-header">
                        <h5 class="modal-title">{{ modalTitle }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <div class="alert alert-danger" role="alert" ng-show="error">
                            {{ errorMessage }}
                        </div>

                        <div class="form-group">
                            <label>Enter First Name</label>
                            <input type="text" name="first_name" ng-model="first_name" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label>Enter Last Name</label>
                            <input type="text" name="last_name" ng-model="last_name" class="form-control" />
                        </div>

                    </div>

                    <div class="modal-footer">
                        <input type="hidden" name="hidden_id" value="{{hidden_id}}">
                        <button type="button" ng-click="submitForm()" class="btn btn-primary" name="submit">{{ submit_button }}</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

                <!-- </form> -->

            </div>
        </div>
    </div>


    <script src="assets/js/index.js"></script>
    
</body>
</html>

