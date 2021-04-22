@extends('backend/layouts/master')
@section('title')
   Add Locale - {{config('app.name')}}
@endsection
@section('content')


<style>
    .cf:after { visibility: hidden; display: block; font-size: 0; content: " "; clear: both; height: 0; }
  * html .cf { zoom: 1; }
  *:first-child+html .cf { zoom: 1; }

  html { margin: 0; padding: 0; }
  body { font-size: 100%; margin: 0; padding: 1.75em; font-family: 'Helvetica Neue', Arial, sans-serif; }

  h1 { font-size: 1.75em; margin: 0 0 0.6em 0; }

  a { color: #2996cc; }
  a:hover { text-decoration: none; }

  p { line-height: 1.5em; }
  .small { color: #666; font-size: 0.875em; }
  .large { font-size: 1.25em; }

  /**
  * Nestable
  */

  .dd { position: relative; display: block; margin: 0; padding: 0; max-width: 600px; list-style: none; font-size: 13px; line-height: 20px; }

  .dd-list { display: block; position: relative; margin: 0; padding: 0; list-style: none; }
  .dd-list .dd-list { padding-left: 30px; }
  .dd-collapsed .dd-list { display: none; }

  .dd-item,
  .dd-empty,
  .dd-placeholder { display: block; position: relative; margin: 0; padding: 0; min-height: 20px; font-size: 13px; line-height: 20px; }

  .dd-handle { display: block; height: 30px; margin: 5px 0; padding: 5px 10px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc;
      background: #fafafa;
      background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
      background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
      background:         linear-gradient(top, #fafafa 0%, #eee 100%);
      -webkit-border-radius: 3px;
              border-radius: 3px;
      box-sizing: border-box; -moz-box-sizing: border-box;
  }
  .dd-handle:hover { color: #2ea8e5; background: #fff; }

  .dd-item > button { display: block; position: relative; cursor: pointer; float: left; width: 25px; height: 20px; margin: 5px 0; padding: 0; text-indent: 100%; white-space: nowrap; overflow: hidden; border: 0; background: transparent; font-size: 12px; line-height: 1; text-align: center; font-weight: bold; }
  .dd-item > button:before { content: '+'; display: block; position: absolute; width: 100%; text-align: center; text-indent: 0; }
  .dd-item > button[data-action="collapse"]:before { content: '-'; }

  .dd-placeholder,
  .dd-empty { margin: 5px 0; padding: 0; min-height: 30px; background: #f2fbff; border: 1px dashed #b6bcbf; box-sizing: border-box; -moz-box-sizing: border-box; }
  .dd-empty { border: 1px dashed #bbb; min-height: 100px; background-color: #e5e5e5;
      background-image: -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                        -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
      background-image:    -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                          -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
      background-image:         linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                                linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
      background-size: 60px 60px;
      background-position: 0 0, 30px 30px;
  }

  .dd-dragel { position: absolute; pointer-events: none; z-index: 9999; }
  .dd-dragel > .dd-item .dd-handle { margin-top: 0; }
  .dd-dragel .dd-handle {
      -webkit-box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
              box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
  }

  /**
  * Nestable Extras
  */

  .nestable-lists { display: block; clear: both; padding: 30px 0; width: 100%; border: 0; border-top: 2px solid #ddd; border-bottom: 2px solid #ddd; }

  #nestable-menu { padding: 0; margin: 20px 0; }

  #nestable-output,
  #nestable2-output { width: 100%; height: 7em; font-size: 0.75em; line-height: 1.333333em; font-family: Consolas, monospace; padding: 5px; box-sizing: border-box; -moz-box-sizing: border-box; }

  #nestable2 .dd-handle {
      color: #fff;
      border: 1px solid #999;
      background: #bbb;
      background: -webkit-linear-gradient(top, #bbb 0%, #999 100%);
      background:    -moz-linear-gradient(top, #bbb 0%, #999 100%);
      background:         linear-gradient(top, #bbb 0%, #999 100%);
  }
  #nestable2 .dd-handle:hover { background: #bbb; }
  #nestable2 .dd-item > button:before { color: #fff; }

  @media only screen and (min-width: 700px) {

      .dd { float: left; width: 48%; }
      .dd + .dd { margin-left: 2%; }

  }

  .dd-hover > .dd-handle { background: #2ea8e5 !important; }

  /**
  * Nestable Draggable Handles
  */

  .dd3-content { display: block; height: 30px; margin: 5px 0; padding: 5px 10px 5px 40px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc;
      background: #fafafa;
      background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
      background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
      background:         linear-gradient(top, #fafafa 0%, #eee 100%);
      -webkit-border-radius: 3px;
              border-radius: 3px;
      box-sizing: border-box; -moz-box-sizing: border-box;
  }
  .dd3-content:hover { color: #2ea8e5; background: #fff; }

  .dd-dragel > .dd3-item > .dd3-content { margin: 0; }

  .dd3-item > button { margin-left: 30px; }

  .dd3-handle { position: absolute; margin: 0; left: 0; top: 0; cursor: pointer; width: 30px; text-indent: 100%; white-space: nowrap; overflow: hidden;
      border: 1px solid #aaa;
      background: #ddd;
      background: -webkit-linear-gradient(top, #ddd 0%, #bbb 100%);
      background:    -moz-linear-gradient(top, #ddd 0%, #bbb 100%);
      background:         linear-gradient(top, #ddd 0%, #bbb 100%);
      border-top-right-radius: 0;
      border-bottom-right-radius: 0;
  }
  .dd3-handle:before { content: '≡'; display: block; position: absolute; left: 0; top: 3px; width: 100%; text-align: center; text-indent: 0; color: #fff; font-size: 20px; font-weight: normal; }
  .dd3-handle:hover { background: #ddd; }

  /**
  * Socialite
  */

  .socialite { display: block; float: left; height: 35px; }

  .menu-dash {

    float: right !important;
}
</style>
<!-- Header -->
<div class="header pb-6 d-flex align-items-center" style="min-height: 200px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
  <!-- Mask -->
  <span class="mask bg-gradient-default opacity-8"></span>
  <!-- Header container -->

</div>
<!-- Page content -->
<x-saveButton />
<form action="{{route ('locale.store')}}" method="POST" style="margin-top: 80px;">
  @csrf
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-4 order-xl-1">
        <div class="card card-profile">
          <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
            <div class="d-flex justify-content-between">
              <p type="submit" class="">Add Menu Item</p>
            </div>
          </div>

          <div class="card-body pt-0">
            <div class="row">
              <div class="col-md-12">
                <div id="accordion" class="py-4">
                  <div class="card m-0">
                    <div class="card-header p-1" id="headingOne">
                      <h5 class="mb-0">
                        <a class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Category
                        </a>
                      </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                          <div class="form-group m-0">
                              <input type="text">
                          </div>
                          @foreach ($data['category'] as $categories)
                          <div class="form-group m-0">
                          <input type="checkbox" value="{{$categories->id}},{{$categories->code}},{{'collection/'.$categories->code}}">
                          <label for="">{{$categories->code}}</label>
                          </div>
                          @endforeach
                          <div class="form-group ">
                              <button class="btn btn-sm btn-default float-right add-to-menu">Add to Menu</button>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="card m-0 ">
                    <div class="card-header p-1" id="headingTwo">
                      <h5 class="mb-0">
                        <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Posts
                        </a>
                      </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                      <div class="card-body">
                          <div class="form-group">
                              <input type="text">
                          </div>
                          @foreach ($data['post'] as $post)
                          <div class="form-group m-0">
                            <input type="checkbox" value="{{$post->id}},{{$post->code}},{{'post/'.$post->code}}" >
                            <label for="">{{$post->code}}</label>
                          </div>
                          @endforeach
                          <div class="form-group ">
                              <button class="btn btn-sm btn-default float-right add-to-menu">Add to Menu</button>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="card m-0">
                    <div class="card-header p-1" id="headingThree">
                      <h5 class="mb-0">
                        <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Pages
                        </a>
                      </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                      <div class="card-body">
                          <div class="form-group">
                              <input type="text">
                          </div>

                          @foreach ($data['pages'] as $page)
                           
                          <div class="form-group m-0">
                            <input type="checkbox" value="{{$page->id}},{{$page->code}},{{'pages/'.$page->code}}" >
                            <label for="">{{$page->code}}</label>
                          </div>
                          @endforeach
                          <div class="form-group ">
                              <button class="btn btn-sm btn-default float-right add-to-menu">Add to Menu</button>
                              </div>
                      </div>
                    </div>
                  </div>
                  <div class="card m-0">
                    <div class="card-header p-1" id="headingThree">
                      <h5 class="mb-0">
                        <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#product" aria-expanded="false" aria-controls="product">
                          Product
                        </a>
                      </h5>
                    </div>
                    <div id="product" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                      <div class="card-body">
                        <div class="form-group">
                            <input type="text">
                        </div>
                        @foreach ($data['product'] as $product)
                        <div class="form-group m-0">
                          <input type="checkbox" value="{{$product->id}},{{$product->slug}},{{'single-product/'.$product->slug}}" >
                          <label for="">{{$product->slug}}</label>
                        </div>
                        @endforeach
                        <div class="form-group ">
                          <button class="btn btn-sm btn-default float-right add-to-menu">Add to Menu</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-8 order-xl-2">
        <div class="card m-0" id="">
          <div class="card-header p-4 card-header-primary">
              <p type="submit" class=""> Menu Structure</p>
          </div>
          <!-- id="sortable" -->
          <div class="cf nestable-lists">
            <div class="dd" id="nestable">
            <?php echo $data['print_menu'] ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection

<script>
  window.onload = function(){
    jQuery('.alert-dark').hide();
    function checkkro(){
      $('#nestable').nestable({
          group: 1,
      }).on('change', function (e) {  
        jQuery('.alert-dark').show();
        dataJson = JSON.stringify($(e.target).nestable('serialize'));
        jQuery('.dd-list').each(function(){
          if(jQuery(this).children().length > 0){
            jQuery(this).children().each(function(index, element){
              if(jQuery(this).attr('sort-id') != index){
                jQuery(this).attr('sort-id', index)
              }
            })
          }
        })
      });
    };
  checkkro();
    jQuery('.add-to-menu').click(function(e){
      e.preventDefault();
      var i = 0,
      data = new Array();
      jQuery('.show').find('input[type="checkbox"]').each(function(){
        if(this.checked){
          var value = {
            'itemID': jQuery(this).val().split(',')[0],
            'itemTitle': jQuery(this).val().split(',')[1],
            'itemUrl': jQuery(this).val().split(',')[2],
            'sort_id': jQuery('.dd-list').eq(0).children().length
          };
    
          let uniqueId = jQuery('.dd-item').length+1+i;
          value.sort_Id = uniqueId;
          data.push(value);
          i++;
        }
      });

      $.ajax({
        type: "POST",
        url: "{{route('menu.store')}}",
        data: {
          "_token": "{{ csrf_token() }}",
          "__data" : JSON.stringify( data )
        },
        dataType: "JSON",
        success: function (response) {
          console.log(response)
          jQuery('#nestable').html(response);
          // $('#nestable').nestable();JSON.parse(response)
          // checkkro();
          $('#nestable').nestable();
        }
      });



    });

    jQuery('.save').click(function(){
      
      $.ajax({
        type: "POST",
        url: "{{route('menu.store')}}",
        data: {
          "_token": "{{ csrf_token() }}",
          "__dataJson" : dataJson
        },
        dataType: "JSON",
        success: function (response) {
          
        }
      });
    });
}

</script>