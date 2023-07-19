@extends('layouts.boot')

@section('content')

<head>
  <style>
      @media print{
          
          
          #search,#bot,#pr,#sidebar-wrapper,#excel{
              display: none;
          }
          .navbar,.icon,.iconc,.mrf,.excel{
              display: none;
          }
         


      }

      .imgall,.printviwe{
        display: none;
      }

  </style>
</head>


<div class="container">

  <br><br>
 
  <div class="row">
    <div class="col-12">
      <input type="search" name="search" id="search" class="form-control" id="exampleInputEmail1" 
      aria-describedby="emailHelp" placeholder="@lang('public.search')" >
       
    </div>
  </div>
  <br> 
  
  <div class="row">
    @if (Auth::user()->add == '1')
    <div class="col-2">
      <button type="button" id="bot" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        @lang('public.studentadd')
      </button>
      
    </div>
    <div class="col-3">
      <a href="/attachstudent" class="btn btn-primary mrf" >
       {{-- @lang('public.backshow') --}}
       @lang('public.addmrf')
      </a>
      
    </div>
@endif
    <div class="col-1">
        <button type="button" class="btn btn-secondary " id="pr">
            <i title="طباعة" style="font-size: 20px" class="fa fa-print" aria-hidden="true"></i>
        </button>
        
      </div>

      <div class="col-1">
        <a href="/exportStudent" class="btn btn-secondary  btn-sm" id="excel">
           <img src="{{ asset('img/ex2.png') }}" alt="" width="30" height="30">
        </a>
        
      </div>

      
      
  </div>

  <br>

  @foreach ($users as $post)
  <div class="text-center imgall showimg">
    <img  src="{{ asset('images/'.$post->img) }}" alt="" width="100px" height="100px">
  </div>
    
  @endforeach
        
        <br>
    <h5 class="text-center">@lang('public.students')</h5>
          <br>
     

      <table class="table  table-striped table-bordered">
        <thead >
        
      <tr>
        <th scope="col">#</th>
        <th scope="col">@lang('public.namestudent')</th>
        <th scope="col">@lang('public.level')</th>
        {{-- <th scope="col">@lang('public.local')</th> --}}
        <th scope="col">  @lang('public.numberphone')</th>
        <th scope="col">  @lang('public.shp')</th>
        <th scope="col">  @lang('public.sex')</th>
        <th scope="col" class="iconc">  @lang('public.control')</th>
      </tr>
      </thead>
      <tbody class="alldata" id="alldata">
      
      </tbody>
      <tbody id="datares" class="serall">  </tbody>
      </table>

      <!-- Modal -->
<div style=" @lang('public.dirl')" class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="staticBackdropLabel">@lang('public.studentadd')</h5>
        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
      </div>
      <div class="modal-body">
        {{-- <form action="{{ route('savestudent') }}" method="POST"> --}}
          {{-- <form action="javascript:void(0)" > --}}
            <form id="upload_formmmm" action="{{ route('insertstudent') }}" enctype="multipart/form-data" method="POST">
          @csrf
          
          <br>
  
          <div class="row">

            {{-- <div class="mb-3 col-12 text-center">
              <img id="preview-image" width="200px" height="200px">
              </div>
              <div class="mb-3 col-6">
                <div class="mb-3">
                   --}}
                  {{-- <label class="form-label" for="inputImage">@lang('public.phteoadd')</label>
                  <input 
                      type="file" 
                      name="img" 
                      id="inputImage"
                      class="form-control" required>
                  <span class="text-danger" id="image-input-error"></span>
              </div>
              </div> --}}

              <div class="mb-3 col-6">
                  <label for="exampleInputEmail1" class="form-label">@lang('public.namestudent')</label>
                  <input type="text" name="name" class="form-control" id="name" required aria-describedby="emailHelp">
                </div>
                
                <div class="mb-3 col-6">
                  <label for="exampleInputPassword1" class="form-label">@lang('public.namefather')</label>
                  <input type="text" class="form-control" name="namefather" id="namefather" required >
                </div>
                
                <div class="mb-3 col-6">
                  <label for="exampleInputPassword1" class="form-label">@lang('public.numberphone')</label>
                  <input type="number" class="form-control" name="phone" id="phone" required>
                </div>
                
                {{-- <div class="mb-3 col-6">
                  <label for="exampleInputPassword1" class="form-label">@lang('public.tatol')</label>
                  <input type="number" class="form-control" name="price" id="price" required>
                </div>
                 --}}
                {{-- <div class="mb-3 col-6">
                  <label for="exampleInputPassword1" class="form-label">@lang('public.pay')</label>
                  <input type="number" class="form-control" name="pay" id="pay1" required>
                </div>
                 --}}
                {{-- <div class="mb-3 col-6">
                  <label for="exampleInputPassword1" class="form-label">@lang('public.passowrd')</label>
                  <input type="password" class="form-control" name="password" id="password" required>
                </div>
                 --}}
                {{-- <div class="mb-3 col-6">
                  <label for="exampleInputPassword1" class="form-label">@lang('public.local2')</label>
                  <input type="text" class="form-control" name="location" id="location" required>
                </div>
   --}}
                {{-- <div class="mb-3 col-6">
                  <label for="exampleInputPassword1" class="form-label">@lang('public.date')</label>
                  <input type="date" class="form-control" name="brit" id="brit" required>
                </div>
               
   --}}
                <div class="mb-3 col-3">
                  
                  <select name="sex" id="sex" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                      <option selected>@lang('public.sex')</option>
                      <option >ذكر</option>
                      <option >انثى</option>
                    
                    </select>
                </div>
  
                <div class="mb-3 col-3">
                  
                  <select name="level" id="level" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                      <option selected>@lang('public.levelc')</option>
                 
                      <option >كيجي 1</option>
                      <option >كيجي 2</option>
                      <option>تمهيدي</option> 
                      <option >الاول</option>
                      <option >الثاني</option>
                      <option >الثالث</option>
                      <option >الرابع</option>
                      <option >الخامس</option>
                      <option >السادس</option>
                      <option >السابع</option>
                      <option >الثامن</option>
                      <option >التاسع</option>
                      <option >اول ثانوي</option>
                      <option >ثاني ثانوي</option>
                      <option >ثالث ثانوي</option>   
                 
                    </select>
  
                </div>
                <div class="mb-3 col-6">
                  <label for="exampleInputPassword1" class="form-label">@lang('public.shp')</label>
                  <input type="text" class="form-control" name="shob" id="shob1" required>
                </div>
  
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('public.logout')</button>
            <button type="submit"  class="btn btn-primary col-6">@lang('public.save')</button>
          </div>       
        </div>          
        </form>
  
      
    </div>
  </div>
</div>
</div>

{{-- ====================================================================== --}}



      <!-- Modal -->
      <div style=" @lang('public.dirl')" class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-center" id="staticBackdropLabel">@lang('public.studentadd')</h5>
              {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body">
              {{-- <form action="{{ route('savestudent') }}" method="POST"> --}}
                <form action="javascript:void(0)" >
                @csrf
                
                <br>
        
                <div class="row">
                  
                    <div class="mb-3 col-6">
                        <label for="exampleInputEmail1" class="form-label">@lang('public.namestudent')</label>
                        <input type="text" name="name" class="form-control" id="name1" aria-describedby="emailHelp" required>
                      </div>
                      
                      <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">@lang('public.namefather')</label>
                        <input type="text" class="form-control" name="namefather" id="namefather1"  required>
                        <input type="text" hidden class="form-control" name="id" id="id1" >
                      </div>
                      
                      <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">@lang('public.numberphone')</label>
                        <input type="number" class="form-control" name="phone" id="phone1" required>
                      </div>
{{--                       
                      <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">@lang('public.tatol')</label>
                        <input type="number" class="form-control" name="price" id="price1" required>
                      </div>
                       --}}
                      
                      {{-- <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">@lang('public.local2')</label>
                        <input type="text" class="form-control" name="location" id="location1" required>
                      </div>
         --}}

                      {{-- <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">@lang('public.date')</label>
                        <input type="date" class="form-control" name="brit" id="brit1" required>
                        <input type="text" hidden class="form-control" name="id" id="id1" >
                      </div>
                      --}}
                      {{-- <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">@lang('public.passowrd')</label>
                        <input type="password" class="form-control" name="password" id="password1" required>
                        
                      </div> --}}
                     
      
        
                      <div class="mb-3 col-3">
                        
                        <select name="level" id="level1" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                            <option selected>@lang('public.levelc')</option>
                       
                            <option >كيجي 1</option>
                            <option >كيجي 2</option>
                            <option>تمهيدي</option> 
                            <option >الاول</option>
                            <option >الثاني</option>
                            <option >الثالث</option>
                            <option >الرابع</option>
                            <option >الخامس</option>
                            <option >السادس</option>
                            <option >السابع</option>
                            <option >الثامن</option>
                            <option >التاسع</option>
                            <option >اول ثانوي</option>
                            <option >ثاني ثانوي</option>
                            <option >ثالث ثانوي</option>   
                       
                          </select>
        
                      </div>
        
                </div>
                
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('public.logout')</button>
                  <button type="button" id="update" class="btn btn-primary col-6">@lang('public.save')</button>
                </div>       
              </div>          
              </form>
        
            
          </div>
        </div>
      </div>
      </div>
      

      {{-- remove --}}

      <!-- Modal -->
<div style=" @lang('public.dirl')" class="modal fade" id="Modalremove" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">@lang('public.del')</h5>
        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
      </div>
      <div class="modal-body">
        @lang('public.mesdel')
        <input type="text" hidden id="dd" > 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('public.logout')</button>
        <button type="button" id="remove" class="btn btn-primary">@lang('public.save')</button>
      </div>
    </div>
  </div>
</div>





{{-- end remove --}}





{{-- block --}}

      <!-- Modal -->
      <div style=" @lang('public.dirl')" class="modal fade" id="blockmodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
              الحظر  
                {{-- @lang('public.del') --}}
              </h5>
              {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body">
            هل انت متاكد من حظر المستخدم
              {{-- @lang('public.mesdel') --}}
              <input type="text" hidden id="dd" > 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('public.logout')</button>
              <button type="button" id="blocks" class="btn btn-primary">@lang('public.save')</button>
            </div>
          </div>
        </div>
      </div>
      
      
      
      
      
      {{-- end block --}}
      





<hr>
      <div class="row printviwe v">
@foreach ($users as $post )

        <div class="col-4"><span>@lang('public.man') :::  </span>{{ $post->namemanager }}</div>
        <div class="col-4"><span>@lang('public.titelm'):::  </span>{{ $post->title }}</div>
        <div class="col-4"><span>@lang('public.mansm') :::  </span>{{ $post->nameanent }}</div>
       <div class="row text-center">
        <br>
        <div class="col-12">{{ $post->nameschool }}</div>
       </div>
        @endforeach
      </div>




<script>

// blockmodel

$(document).on('click','.block',function(){
 var id = $(this).data('id');
//  alert(id);
$('#dd').val(id);

$('#blockmodel').modal('show');

});

</script>

<script>
$(document).on('click','#blocks',function(){
 var id = $('#dd').val();
//  alert(id);

$.ajax({
type:'get',
url:'{{ URL::to('insertblock') }}',
data:{'id':id},
success:function(){

  $('#blockmodel').modal('hide');

  toastr.options =
 {
   "closeButton" : true,
   "progressBar" : true
 }
     // toastr.success("{{ session('message') }}");
     
     toastr.info("تم الحظر");
     // toastr.warning("{{ session('warning') }}");
     // toastr.error("{{ session('error') }}");
   
}
});


});  
</script>



      <script>
        $('#inputImage').change(function(){    
             let reader = new FileReader();
        
             reader.onload = (e) => { 
                 $('#preview-image').attr('src', e.target.result); 
             }   
       
             reader.readAsDataURL(this.files[0]) 
          
         });
     </script>
     
    {{-- ================================================end --}}
@if (Session::has('message'))
      {{-- <div class="alert alert-primary" role="alert">
          {{ Session::get('message'); }}
      </div> --}}
      <script>
        toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		// toastr.success("{{ session('message') }}");
      
  		toastr.info("{{ session('message') }}");
      // toastr.warning("{{ session('warning') }}");
      // toastr.error("{{ session('error') }}");
      </script>
      @endif
      

            @if (Session::has('error'))
      <div class="alert alert-danger" role="alert">
          {{ Session::get('error'); }}
      </div>
      @endif


</div>


<script>

  $(document).on('click','#excel',function(){
    $.ajax({
      type:'get',
      url:'{{ URL::to('exportStudent') }}',
      success:function(){
        
       toastr.options =
 {
   "closeButton" : true,
   "progressBar" : true
 }
     // toastr.success("{{ session('message') }}");
     
     toastr.info("تم انشاء نسخة Excel للطلاب");
     // toastr.warning("{{ session('warning') }}");
     // toastr.error("{{ session('error') }}");
   
      }
    });
  });
</script>

<script>
  //print
  $(document).on('click','#pr',function(){
            $('.toggled').removeClass("toggled");
  $('.imgall').removeClass("imgall");
            $('.v').removeClass("printviwe");
            
            print();
            $( ".showimg" ).addClass("imgall");
            $('#wrapper').addClass("toggled");
          $( ".v" ).addClass("printviwe");     

        });
</script>

<script>
  /////////////student remove

$(document).on('click','#remove',function(){

  
var id= $('#dd').val();

$.ajax({

  type:'get',
  url:'{{ URL::to('removestudnet') }}',
  data:{'id':id},
  success:function(){
   
    $('#Modalremove').modal('hide');
    $('.modal-backdrop').removeClass("modal-backdrop");
    showalldata();
    
    
       toastr.options =
 {
   "closeButton" : true,
   "progressBar" : true
 }
     // toastr.success("{{ session('message') }}");
     
     toastr.info("تم حذف الطالب");
     // toastr.warning("{{ session('warning') }}");
     // toastr.error("{{ session('error') }}");
   
    
  }


});


function showalldata(){
       
 
       $.ajax({
             type:'get',
             url:'{{ URL::to('showstudentall') }}',
             // data:{'search':$value},
       
             success:function(data){
              //  console.log(data);
               $('#alldata').html(data);
             }
       
       
           });
       
             }

});

//////////end student remove
</script>

<script>
  $(document).ready(function(){


    showalldata();

////////update 
    $(document).on('click','#update',function(){


var  namefather =   $('#namefather1').val();
var brit  =  $('#brit1').val();
var  location =  $('#location1').val();
var id=  $('#id1').val();
  // var password= $('#password1').val();
var phone = $('#phone1').val();
var level =   $('#level1').val(); 
var name = $('#name1').val();
var price =  $('#price1').val();
// var password =  $('#password1').val();
 

  $.ajax({
  type:'get',
  url:'{{ URL::to('updatestudent') }}',
  data:{'namefather':namefather,'brit':brit,'location':location,'id':id,
  'phone':phone,'level':level,'name':name,'price':price},
  success:function(){
showalldata();
         $('#staticBackdrop2').modal('hide');
         $('.modal-backdrop').removeClass("modal-backdrop");
 toastr.options =
   {
     "closeButton" : true,
     "progressBar" : true
   }
       // toastr.success("{{ session('message') }}");
       
       toastr.info("تم حفظ تعديل الطالب");
       // toastr.warning("{{ session('warning') }}");
       // toastr.error("{{ session('error') }}");

  }


  });



    });

/////////////end update







////////////////search
    
  $('#search').on('keyup',function(){

var value = $(this).val();
//     type:'get',
// url:'{{ URL::to('searchemp') }}',
// data:{'searchemp':value},
// alert(value);datares

if(value != ''){
  $('.serall').show();
$('.alldata').hide();

$.ajax({
  type:'get',
  url:'{{ URL::to('searchstudent') }}',
  data:{'search':value},
  success:function(data){
    $('#datares').html(data);
  }
});



}else{
$('.serall').hide();
$('.alldata').show();
}

});



//////////view remove

$(document).on('click','.editv',function(){

  var id= $(this).data('id');
  // alert(id);
  $('#dd').val(id);
  // $('#namefather1').val(namefather);
  // exampleModal
  $('#Modalremove').modal('show');

});


////view update

$(document).on('click','.edit',function(){



  var namefather=  $(this).data('namefather');
   var brit=  $(this).data('brit');
 var location=  $(this).data('location');
   var id= $(this).data('id');
  // var password= $('#password').val();
  var phone= $(this).data('phone');
  var level= $(this).data('level');
  var name = $(this).data('name');
  var price = $(this).data('price');
  // var password = $(this).data('password');
  
  // $('#password1').val(password);
    $('#namefather1').val(namefather);
     $('#brit1').val(brit);
   $('#location1').val(location);
  $('#id1').val(id);
  // var password= $('#password1').val();
   $('#phone1').val(phone);
   $('#level1').val(level);
   $('#name1').val(name);
  $('#price1').val(price);
  $('#staticBackdrop2').modal('show');


});




    function showalldata(){
       
 
       $.ajax({
             type:'get',
             url:'{{ URL::to('showstudentall') }}',
             // data:{'search':$value},
       
             success:function(data){
               console.log(data);
               $('#alldata').html(data);
             }
       
       
           });
       
             }
       
  });
</script>




<script>

  $('#save').on('click',function(){
    var namefather=  $('#namefather').val();
   var brit=  $('#brit').val();
 var location=  $('#location').val();
   var sex= $('#sex').val();
  var password= $('#password').val();
  var phone= $('#phone').val();
  var level= $('#level').val();
  var name = $('#name').val();
  var price = $('#price').val();
     // alert(id);
     $.ajax({
       type:'get',
       url:'{{ URL::to('insertstudent') }}',
       data:{'name':name,'price':price,'level':level,'phone':phone,
       'namefather':namefather,'password':password,'sex':sex,'location':location,'brit':brit},
       success:function(){
         // $('#datares').html(data);
         showalldata();
         $('#staticBackdrop').modal('hide');
         $('.modal-backdrop').removeClass("modal-backdrop");
         toastr.options =
   {
     "closeButton" : true,
     "progressBar" : true
   }
       // toastr.success("{{ session('message') }}");
       
       toastr.info("تم حفظ الطالب");
       // toastr.warning("{{ session('warning') }}");
       // toastr.error("{{ session('error') }}");
      
       }
     });
 
     function showalldata(){
       
 
 $.ajax({
       type:'get',
       url:'{{ URL::to('showstudentall') }}',
       // data:{'search':$value},
 
       success:function(data){
         console.log(data);
         $('#alldata').html(data);
       }
 
 
     });
 
       }
   
 
   });
 </script>
 


 
<script>
  //action="{{ route('ajaxImageUpload') }}"
    $('#upload_form').on('submit',function(e){
  
  e.preventDefault();
  
  $.ajax({
    url:"{{ route('insertstudent') }}",
    method:'POST',
    data:new FormData(this),
    dataType:'JSON',
    contentType:false,
    cache:false,
    processData:false,
    success:function(){
  
      window.location.href = '/students2';
      $('#staticBackdrop').modal('hide');
          $('.modal-backdrop').removeClass("modal-backdrop");
      toastr.options =
  {
  "closeButton" : true,
  "progressBar" : true
  }
  // toastr.success("{{ session('message') }}");
  
  // toastr.info("تم اضافة الصف");
    }
  
  
  });
  
  
  
  
  
  $('#staticBackdrop').modal('hide');
          $('.modal-backdrop').removeClass("modal-backdrop");
      toastr.options =
  {
  "closeButton" : true,
  "progressBar" : true
  }
  // toastr.success("{{ session('message') }}");
  
  toastr.info("تم حفظ الطالب");
  getall();
  // window.location.href = '/students2';
  //window.location.href = '/insertteacher';
  //window.location.href = '/insertteacher';
  function getall(){
   $.ajax({
     type:'get',
     url:'{{ URL::to('showstudentall') }}',
     success:function(data){
       $('#alldata').html(data);
     }
   });
  }
  
  // $("#upload_form")[0].reset();

    });
  </script>
  
      
  
  
  

@endsection