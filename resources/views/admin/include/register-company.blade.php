    <div id="register-company" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm smx">
            <!-- Modal content-->
            <div class="modal-content box-edge">
                <div class="modal-body p-25 oh">
                    <section class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Register New Company</h3>
                        </div>
                        <div class="panel-body">
                            <form class="form" method="post" action="{{route('company.store')}}">
                               {{csrf_field()}}
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <input type="text" name="company" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class=" form-control" placeholder="Company Email">
                                </div>
                                 <div class="form-group">
                                </div>
                                 <button type="submit" class="btn btn-success btn-prime box-edge pull-right">Register</button>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

