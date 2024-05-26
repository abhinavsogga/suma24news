
<!-- row -->
<div class="row">

<div class="col-lg-8 col-12">
    <!-- card -->
  <div class="card mb-4">
      <!-- card body -->
    <div class="card-body">
      <div>
          <!-- input -->
        <div class="mb-3">
          <label class="form-label">{{ __('Name') }}</label>
          <input type="text" name="name" value="{{old('name', $user->name ?? '')}}" class="form-control">
        </div>
          <!-- input -->
        <div class="mb-3">
          <label class="form-label">{{ __('Email') }}</label>
          <input type="text" name="email" value="{{old('email', $user->email ?? '')}}" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">{{ __('Password') }}</label>
          <input type="password" name="password" value="" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">{{ __('Role') }}</label>
          <select name="role" class="form-control">
            <option>--Select Role--</option>
            @foreach($roles as $role)
              <option value="{{ $role->name }}" @if(isset($user) && $user->role === $role->name) selected @endif>{{ ucfirst($role->name) }}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
  </div>
   
</div>

</div>