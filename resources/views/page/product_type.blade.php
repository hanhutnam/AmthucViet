@extends('page.layout')


@section('content')



<div class="inner-header">
    <div class="container">
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('page.trangchu')}}">Trang chủ</a> / <span>Loại sản phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <form action="{{route('search')}}" method="GET">
    <div class="row">
        <div class="col-sm-3">
            <label for="">Tỉnh thành</label>
            <select name="areaname" id="areaname" class="custom-select areaname choose" style="height:37px">
                <option selected value="0">Tất cả</option>
                @foreach($areas as $area)
                    <option value="{{$area->id}}" >{{$area->areaname}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-3">
            <label for="">Nhà hàng</label>
            <select name="restaurant" id="restaurant" class="custom-select restaurant choose" style="height:37px">
                <option selected value="0">Tất cả</option>
            </select>
        </div>
        <div class="col-sm-3">
            <label for="">Tên món ăn</label>
            <select name="product" id="product" class="custom-select product " style="height:37px">
                <option selected value="0">Tất cả</option>
            </select>
        </div>
        <div class="col-sm-3" style="margin-top:21px">  
            <button type="submit" class="btn btn-primary my-1">Tìm kiếm</button>
            <!-- <input type="button" class="btn btn-primary search" value="Tìm kiếm"> -->
        </div>

        </div>
    </div>
    </form>
</div>
<div class="container" style="min-width:97%">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-1">
                    
                </div>
                @yield('data')
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection


@section('js')

<script type="text/javascript">
$('#areaname').change(function() {
    var id = $(this).val();
   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '{{route("search.retaurent")}}',
        type: 'POST',
        data: {
            'area_id':id,
        },
        dataType: "json",
        success: function(data) {
            if (data) {
                // $("#restaurant").empty();
                $.each(data, function(key, value) {
                    $("#restaurant").append('<option value="'+value['id']+'">'+value['name']+'</option>');
                });
            }

        }
    }); 

});

$('#restaurant').change(function() {
    var id = $(this).val();
   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '{{route("search.product")}}',
        type: 'POST',
        data: {
            'restaurant_id':id,
        },
        dataType: "json",
        success: function(data) {
            if (data) {
                // $("#product").empty();
                $.each(data, function(key, value) {
                    // console.log(value); 
                    $("#product").append('<option value="'+value['id']+'">'+value['name']+'</option>');
                });
            }

        }
    }); 
});


// $('#search').click(function() {
//     var id = $(this).val();
   
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });

//     $.ajax({
//         url: '{{route("search")}}',
//         type: 'POST',
//         data: {
//             'area_id':id,
//         },
//         dataType: "json",
//         success: function(data) {
//             if (data) {
//                 // $("#restaurant").empty();
//                 $.each(data, function(key, value) {
//                     $("#data").append('<option value="'+value['id']+'">'+value['name']+'</option>');
//                 });
//             }

//         }
//     }); 
// });
</script>
@endsection
