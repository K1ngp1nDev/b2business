<section class="category">
    <div class="container">
        <form action="/offers" method="GET">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <div class="dropdown">
                            <select class="custom-select" name="category" id="select-category" data-token="{{ csrf_token() }}">
                                @foreach($categories as $category)
                                    @if($category->id == $category->parent_id)
                                        <option class="dropdown-item" value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="input-group mb-3 filter-price-input">
                        <div class="filter-grid-inputs">
                            <span>від</span>
                            <input type="number" name="price_min" class="form-control filter-price-input-from" placeholder="грн" min="0">
                            <span>до</span>
                            <input type="number" name="price_max"class="form-control filter-price-input-to" placeholder="грн" min="0">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="dropdown">
                            <select class="custom-select">
                                <option class="dropdown-item">Сортувати по</option>
                                <option class="dropdown-item">Нерухомість</option>
                                <option class="dropdown-item">Нерухомістьь</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-filter-search">Знайти</button>
                </div>
                <div class="col-sm-9 filter-grid-container" id="subcategories">
                    @include('offers.subcategories', ['categories' => $categories->first()->subcategories])
                </div>
            </div>
        </form>
    </div>
</section>

@section('js')
    <script>
        $(document).ready(function () {
            $('#select-category').on('click', function () {
                var val = $(this).val();
                var token = $(this).attr('data-token');
                $.ajax({
                    type: 'post',
                    data: { '_token' : token },
                    dataType: 'json',
                    url: '/offers/' + val,
                    success: function (data) {
                        $('#subcategories').html(data.html);
                    }
                })
            });
        });
    </script>
@endsection
