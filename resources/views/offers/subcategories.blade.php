@foreach($categories as $category)
    @if($category->id != $category->parent->id)
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="subcategories[{{ $category->name }}]" id="exampleCheck{{ $category->id }}">
            <label class="form-check-label" for="exampleCheck{{ $category->id }}">{{ $category->name }}</label>
        </div>
    @endif
@endforeach
