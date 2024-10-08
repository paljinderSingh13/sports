@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <!-- Page Content-->
    <div class="page-content">
        <div class="container-xxl">
            <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col">                      
                                                <h4 class="card-title">Administrators</h4>                      
                                            </div><!--end col-->
                                        </div>  <!--end row-->                                  
                                    </div><!--end card-header-->
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <table class="table datatable" id="datatable_1">
                                                <thead class="table-light">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Admin Id.</th>
                                                    <th>Role</th>
                                                    <th>start date</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                   
                                                    <tr>
                                                        <td>Theodore Duran</td><td>8971</td><td>Head Coach</td><td>under 16</td><td>97%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kylie Bishop</td><td>3147</td><td>Norman</td><td>2005/09/08</td><td>63%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Willow Gilliam</td><td>3497</td><td>Amqui</td><td>2009/29/11</td><td>30%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Blossom Dickerson</td><td>5018</td><td>Kempten</td><td>2006/11/09</td><td>17%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Elliott Snyder</td><td>3925</td><td>Enines</td><td>2006/03/08</td><td>57%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Castor Pugh</td><td>9488</td><td>Neath</td><td>2014/23/12</td><td>93%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pearl Carlson</td><td>6231</td><td>Cobourg</td><td>2014/31/08</td><td>100%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Deirdre Bridges</td><td>1579</td><td>Eberswalde-Finow</td><td>2014/26/08</td><td>44%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Daniel Baldwin</td><td>6095</td><td>Moircy</td><td>2000/11/01</td><td>33%</td>
                                                    </tr>  
                                                    <tr>
                                                        <td>Pearl Carlson</td><td>6231</td><td>Cobourg</td><td>2014/31/08</td><td>100%</td>
                                                    </tr>  
                                                    <tr>
                                                        <td>Unity Pugh</td>
                                                        <td>9958</td>
                                                        <td>Curicó</td>
                                                        <td>2005/02/11</td>
                                                        <td>37%</td>
                                                    </tr>    
                                                     <tr>
                                                        <td>Elliott Snyder</td><td>3925</td><td>Enines</td><td>2006/03/08</td><td>57%</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>   
                                    </div><!--end card-body--> 
                                </div><!--end card--> 
                            </div> <!--end col-->                                                        
                        </div><!--end row-->

                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col">                      
                                                <h4 class="card-title">Players</h4>                      
                                            </div><!--end col-->
                                        </div>  <!--end row-->                                  
                                    </div><!--end card-header-->
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <table class="table datatable" id="datatable_2">
                                                <thead class="table-light">
                                                <tr>
                                                    <th>Picture</th>
                                                    <th>Player Id.</th>
                                                    <th>Name.</th>
                                                  
                                                    <th>DOB</th>
                                                    <th>Type</th>
                                                    <th>Priority</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                   
                                                    <tr>
                                                        <td>
                                                        <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle thumb-md me-1 d-inline">
                                                        </td>
                                                        <td>8971</td>
                                                        <td>ABC</td>
                                                        <td>2005/09/08</td>
                                                        <td>Permanent</td>
                                                         <td>1</td>
                                                        <td>Active</td>
                                                    </tr>
                                                    <tr>
                                                        <td>                                                       
                                                             <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle thumb-md me-1 d-inline">
                                                        </td>
                                                        <td>8972</td>
                                                        <td>ABC 1</td>
                                                        <td>2005/09/08</td>
                                                        <td>Permanent</td>
                                                         <td>2</td>
                                                        <td>Active</td>
                                                    </tr>
                                                    <tr>
                                                        <td>                                                       
                                                             <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle thumb-md me-1 d-inline">
                                                        </td>
                                                        
                                                        <td>8973</td>
                                                        <td>ABC 2</td>
                                                        <td>2005/09/08</td>
                                                        <td>Permanent</td>
                                                         <td>3</td>
                                                        <td>Active</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                        <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle thumb-md me-1 d-inline">
                                                        </td>
                                                        <td>8971</td>
                                                        <td>ABC</td>
                                                        <td>2005/09/08</td>
                                                        <td>Permanent</td>
                                                         <td>1</td>
                                                        <td>Active</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                        <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle thumb-md me-1 d-inline">
                                                        </td>
                                                        <td>8971</td>
                                                        <td>ABC</td>
                                                        <td>2005/09/08</td>
                                                        <td>Permanent</td>
                                                         <td>1</td>
                                                        <td>Active</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                        <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle thumb-md me-1 d-inline">
                                                        </td>
                                                        <td>8971</td>
                                                        <td>ABC</td>
                                                        <td>2005/09/08</td>
                                                        <td>Permanent</td>
                                                         <td>1</td>
                                                        <td>Active</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                        <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle thumb-md me-1 d-inline">
                                                        </td>
                                                        <td>8971</td>
                                                        <td>ABC</td>
                                                        <td>2005/09/08</td>
                                                        <td>Permanent</td>
                                                         <td>1</td>
                                                        <td>Active</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                        <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle thumb-md me-1 d-inline">
                                                        </td>
                                                        <td>8971</td>
                                                        <td>ABC</td>
                                                        <td>2005/09/08</td>
                                                        <td>Permanent</td>
                                                         <td>1</td>
                                                        <td>Active</td>
                                                    </tr>
                                                    <tr>
                                                        <td>                                                       
                                                             <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle thumb-md me-1 d-inline">
                                                        </td>
                                                        <td>8972</td>
                                                        <td>ABC 1</td>
                                                        <td>2005/09/08</td>
                                                        <td>Permanent</td>
                                                         <td>2</td>
                                                        <td>Active</td>
                                                    </tr>
                                                    <tr>
                                                        <td>                                                       
                                                             <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle thumb-md me-1 d-inline">
                                                        </td>
                                                        <td>8972</td>
                                                        <td>ABC 1</td>
                                                        <td>2005/09/08</td>
                                                        <td>Permanent</td>
                                                         <td>2</td>
                                                        <td>Active</td>
                                                    </tr>
                                                    <tr>
                                                        <td>                                                       
                                                             <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle thumb-md me-1 d-inline">
                                                        </td>
                                                        <td>8972</td>
                                                        <td>ABC 1</td>
                                                        <td>2005/09/08</td>
                                                        <td>Permanent</td>
                                                         <td>2</td>
                                                        <td>Active</td>
                                                    </tr>
                                                    <tr>
                                                        <td>                                                       
                                                             <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle thumb-md me-1 d-inline">
                                                        </td>
                                                        <td>8972</td>
                                                        <td>ABC 1</td>
                                                        <td>2005/09/08</td>
                                                        <td>Permanent</td>
                                                         <td>2</td>
                                                        <td>Active</td>
                                                    </tr>
                                                    <tr>
                                                        <td>                                                       
                                                             <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle thumb-md me-1 d-inline">
                                                        </td>
                                                        <td>8972</td>
                                                        <td>ABC 1</td>
                                                        <td>2005/09/08</td>
                                                        <td>Permanent</td>
                                                         <td>2</td>
                                                        <td>Active</td>
                                                    </tr>
                                                    <tr>
                                                        <td>                                                       
                                                             <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle thumb-md me-1 d-inline">
                                                        </td>
                                                        <td>8972</td>
                                                        <td>ABC 1</td>
                                                        <td>2005/09/08</td>
                                                        <td>Permanent</td>
                                                         <td>2</td>
                                                        <td>Active</td>
                                                    </tr>
                                                    <tr>
                                                        <td>                                                       
                                                             <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle thumb-md me-1 d-inline">
                                                        </td>
                                                        <td>8972</td>
                                                        <td>ABC 1</td>
                                                        <td>2005/09/08</td>
                                                        <td>Permanent</td>
                                                         <td>2</td>
                                                        <td>Active</td>
                                                    </tr>
                                                    <tr>
                                                        <td>                                                       
                                                             <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle thumb-md me-1 d-inline">
                                                        </td>
                                                        <td>8972</td>
                                                        <td>ABC 1</td>
                                                        <td>2005/09/08</td>
                                                        <td>Permanent</td>
                                                         <td>2</td>
                                                        <td>Active</td>
                                                    </tr>

                                                    

                                                   
                                                </tbody>
                                            </table>
                                        </div>   
                                    </div><!--end card-body--> 
                                </div><!--end card--> 
                            </div> <!--end col-->                                                        
                        </div><!--end row-->

                                                        
                    </div><!-- container -->
        </div>
</div>


@endsection