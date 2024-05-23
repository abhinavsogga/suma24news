<div class="mb-3">
	<label class="form-label" for="title">{{ __('Title') }}</label>
	<input type="text" name="title" id="title" class="form-control" value="{{old('title', $category->title ?? '')}}">
	</div>
	<div class="mb-3">
	<label class="form-label" for="description">{{ __('Description') }}</label>
	<textarea id="description" class="form-control" name="description">{{old('description', $category->description ?? '')}}</textarea>
	</div>
	<div class="mb-3">
	<label for="status" class="form-label">{{ __('Status') }}</label>
	<select name="status" id="status" class="form-select">
		<option value="1" {{ old('status', $category->status ?? 1) === 1 ? 'selected' : '' }}>Active</option>
        <option value="0" {{ old('status', $category->status ?? null) === 0 ? 'selected' : '' }}>Inactive</option>
	</select>
</div>