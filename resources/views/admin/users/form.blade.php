
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
          <input type="text" name="title" value="{{old('title', $user->name ?? '')}}" class="form-control">
        </div>
          <!-- input -->
        <div class="mb-3">
          <label class="form-label">{{ __('Email') }}</label>
          <input type="text" name="title" value="{{old('title', $user->email ?? '')}}" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">{{ __('Password') }}</label>
          <input type="text" name="title" value="" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">{{ __('Rols') }}</label>
          <Select name="role" class="form-control">
            @foreach($roles as $role)
            <option>{{ $role->name }}</option>
            @endforeach
          </Select>
        </div>
      </div>
    </div>
  </div>
   
</div>

</div>