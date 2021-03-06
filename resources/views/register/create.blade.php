@extends('layout')
@section('content')

@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
<?php if(session('success')) : ?>
     <div class="alert alert-success" role="alert">Review was successfully Inserted.</div>
<?php endif ?>
<?php if(!empty($errop)) : ?>
  <?php foreach ($errop->all() as $error) : ?>
    <div class="alert alert-danger">
    <li>
      <?php echo $error ?>
    </li>
    </div>
  <?php endforeach ?>
<?php endif ?>

<?php if(count($errors) > 0) : ?>
  dd(count($errors));
  <ul>
    <?php foreach ($errors->all() as $error) : ?>
      <div class="alert alert-danger">
      <li>
        <?php echo $error ?>
      </li>
      </div>
    <?php endforeach ?>
  </ul>
<?php endif ?>
 <div class="container">
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
<form action="/register/new" method="post" role="form">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
<h2>Register <small>Do it.</small></h2>
<hr class="colorgraph">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
                        <input type="text" name="name" id="name" class="form-control input-lg" placeholder="Name" tabindex="1">
</div>
</div>
</div>
<div class="form-group">
<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4">
</div>
<div class="row">
<div class="col-xs-12 col-sm-5 col-md-5">
<div class="form-group">
<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
</div>
</div>
<div class="col-xs-12 col-sm-7 col-md-7">
<div class="form-group">
<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="6">
</div>
</div>
</div>


<hr class="colorgraph">
<div class="row">
<div class="col-xs-12 col-md-12"><input type="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>

</div>
</form>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
</div>
<div class="modal-body">
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
@endsection
