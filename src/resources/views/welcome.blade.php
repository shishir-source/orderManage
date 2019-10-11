<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap_3_3_7.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap_3_3_7.min.css')}}">
        <script src="{{asset('assets/js/core/jquery.3.2.1.min.js')}}"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script>
            WebFont.load({
                google: {"families":["Open+Sans:300,400,600,700"]},
                custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['../assets/css/fonts.css']},
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>
        <script src="{{asset('assets/js/plugin/webfont/webfont.min.js')}}"></script>

        <!-- Styles -->
        <style>
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .top-div{
          background-color: #f9f9f9;
          padding:5px 0px 5px 10px;
          border-radius: 7px;
          clear: both;
        }

        .btn-file {
          position: relative;
          overflow: hidden;
        }

    .btn-file input[type=file] {
      position: absolute;
      top: 0;
      right: 0;
      min-width: 100%;
      min-height: 100%;
      font-size: 100px;
      text-align: right;
      filter: alpha(opacity=0);
      opacity: 0;
      outline: none;
      background: white;
      cursor: inherit;
      display: block;
    }
        </style>
    </head>
    <body>
        <div class="container " style="padding-top: 30px;">
            <div class="top-right links">
                @auth
                    <a href="">Home</a>
                @else
                    <a href="">Login</a>
                    <a href="">Register</a>
                @endauth
            </div>

            <div>
                <h3>Create Booking</h3>
            </div>

            <form role="form" enctype="multipart/form-data" target="_blank">

            <div class="top-div">

              <div class="row">
                <div class="col-md-4 col-xs-4">
                  <div class="form-group">
                    <label class="col-md-12">label 1</label>
                    <div class="col-md-12">
                      <input type="text" name="" class="form-control" value="" title="label 1">
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-xs-4">
                  <div class="form-group " >
                    <label class="col-md-12">label 2</label>
                    <div class="col-md-12">
                      <input type="text" name="" class="form-control" value="">
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-xs-4">
                  <div class="form-group " >
                    <label class="col-md-12">label 3</label>
                    <div class="col-md-12">
                        <input type="text" name="" class="form-control"  value="">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4 col-xs-4">
                  <div class="form-group">
                    <label class="col-md-12">label 4</label>
                    <div class="col-md-12">
                      <input type="text" name="" class="form-control" value="">
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-xs-4">
                  <div class="form-group " >
                    <label class="col-md-12">label 5</label>
                    <div class="col-md-12">
                      <input type="text" id="" name="" class="form-control" >
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-xs-4">
                  <div class="form-group " >
                    <label class="col-md-12">label 6</label>
                    <div class="col-md-12">
                      <input type="text" name="" class="form-control" >
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div style="padding-top: 30px;"></div>

            <div class="table-responsive" style="height: 400px;">
            <table class="table table-bordered table-striped " style="overflow-y: scroll;" id="filed_increment">
              <thead>
                <tr>
                  <th>Label 1</th>
                  <th>Label 2</th>
                  <th>Label 3</th>
                  <th>Label 4</th>
                  <th>Label 5</th>
                  {{-- <th></th> --}}
                </tr>
              </thead>
              <tbody class="idclone" >
                <tr class="tr_clone">
                  <td>
                    <div class="form-group">
                        <input type="text" name="" class="form-control" placeholder="label 1">
                    </div>
                  </td>

                  <td>
                    <div class="form-group ">
                        <input type="text" name="" class="form-control" placeholder="Label 2">
                      </div>
                  </td>

                  <td>
                    <div class="form-group">
                      <input type="text" name="s" class="form-control item_style" id="item_style" placeholder="Label 3">
                    </div>
                  </td>

                  <td>
                    <div class="form-group">
                      <input type="text" name="" class="form-control item_sku" id="item_sku" placeholder="Label 4">
                    </div>
                  </td>

                  <td>
                    <div class="form-group">
                      <input type="text" name="" class="form-control" placeholder="Label 5">
                    </div>
                  </td>
                  {{-- <td></td> --}}
                </tr>
              </tbody>
            </table>
           </div>

            <div class="form-group button_add pull-left" style="margin-top: 20px;margin-bottom: 20px; ">
              <button type="submit" class="btn btn-success" id="add"><i class="fa fa-copy" style="padding-right: 5px;"></i>Copy Item</button>
              {{-- <button type="submit" class="btn btn-success" id="order_copy"><i class="fa fa-plus" style="padding-right: 5px;"></i>Add New Item</button> --}}
              <button type="submit" class="btn btn-primary" name="order_submit" value="">Save</button>
            </div>
          </form>
            </div>
        </div>

        <script src="{{asset('js/booking.js')}}"></script>        
        <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
    </body>
</html>
