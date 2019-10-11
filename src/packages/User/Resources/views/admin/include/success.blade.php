@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" style="padding-top: 0px;padding-right: 35px;">&times;</button>
            {{ Session::get('success') }}
    </div>
@endif