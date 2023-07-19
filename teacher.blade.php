@extends('layouts.boot')

@section('content')


<head>
  <style>
      @media print{
          
          
          #search,#bot,#pr,#sidebar-wrapper,#excel,#addmrf{
              display: none;
          }
          .navbar,.icon,.iconc{
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
    <div class="col-3">
      <button type="button" id="bot" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        @lang('public.addteacher')
      </button>
      
    </div>

    
    <div class="col-3">
      <a  href="/attachteacher" class="btn btn-primary " id="addmrf">
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
      <a href="/exportTeacher" class="btn btn-secondary  btn-sm" id="excel">
         <img src="{{ asset('img/ex2.png') }}" alt="" width="30" height="30">
      </a>
      
    </div>

  </div>
  <br>
  <h5 class="text-center">@lang('public.teachers')</h5>

@foreach ($users as $post)
<div class="text-center imgall showimg">
  <img  src="{{ asset('images/'.$post->img) }}" alt="" width="100px" height="100px">
</div>
  
@endforeach
      <br>

      <table class="table  table-striped table-bordered">
        <thead >
      <tr>
        <th scope="col">#</th>
        <th scope="col">@lang('public.nameteacher')</th>
        <th scope="col">@lang('public.level')</th>
        <th scope="col">@lang('public.subject')</th>
        <th scope="col">  @lang('public.numberphone')</th>
        <th scope="col">  @lang('public.mah')</th>
        <th scope="col">  @lang('public.nameeem')</th>
        <th scope="col" class="iconc">  @lang('public.control') </th>
      </tr>
      </thead>
      <tbody class="alldata" id="alldata">
      
      </tbody>
      <tbody id="datares" class="serall">  </tbody>
      </table>
        </div>

      <!-- Modal -->
<div style=" @lang('public.dirl')" class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="staticBackdropLabel">@lang('public.addteacher')</h5>
        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
      </div>
      <div class="modal-body">
        {{-- <form id="add" action="javascript:void(0)"> --}}

          <form id="upload_formmmm" action="{{ route('saveteacher') }}" enctype="multipart/form-data" method="POST">
          @csrf
          <h3 class="text-center">@lang('public.teachers')</h3>
          <br>
  
         
          <br>
  
          <div class="row">

{{--             
           <div class="mb-3 col-12 text-center">
              <img id="preview-image" width="200px" height="200px">
              </div>
               --}}
{{--                
              <div class="mb-3 col-6">
                <div class="mb-3">
                  <label class="form-label" for="inputImage">@lang('public.phteoadd')</label>
                  <input 
                      type="file" 
                      name="img" 
                      id="inputImage"
                      class="form-control">
                  <span class="text-danger" id="image-input-error"></span>
              </div>
              </div> --}}

              <div class="mb-3 col-6">
                  <label for="exampleInputEmail1" class="form-label">@lang('public.nameteacher')</label>
                  <input type="text" name="name" required class="form-control" id="name" aria-describedby="emailHelp" required>
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
                  <label for="exampleInputPassword1" class="form-label">@lang('public.passowrd')</label>
                  <input type="password" class="form-control" name="password" id="password" required>
                </div>
                 --}}
{{--                  
                <div class="mb-3 col-6">
                  <label for="exampleInputPassword1" class="form-label">@lang('public.local2')</label>
                  <input type="text" class="form-control" name="location" id="location" required>
                </div> --}}
{{--   
                <div class="mb-3 col-6">
                  <label for="exampleInputPassword1" class="form-label">@lang('public.date')</label>
                  <input type="date" class="form-control" name="brit"  id="brit" required>
                </div>
                 --}}

                <div class="mb-3 col-3">
                  <select name="matrail" id="matrail" class="form-select form-select-lg mb-3" required aria-label=".form-select-lg example">
                    <option selected>@lang('public.subjectselect')</option>
                   
                    <option >القران كريم</option>
                    <option >التربية اسلامية</option> 
                    <option >اللغة عربية</option>
                    <option >اللغة الانجليزية</option>
                    <option >رياضيات</option>
                    <option >علوم</option>
                    <option >اجتماعيات</option>
                    <option >فيزياء</option>
                    <option >كيمياء</option>
                    <option >احياء</option>
                    <option >التاريخ</option>
                    <option >الجغرافيا</option>
                    <option >المجتمع</option>
                    <option >الكمبيوتر</option>
                    <option >السلوك</option>
                    
                  </select>
                </div>   
                <div class="mb-3 col-3">
                  
                  <select name="sex" id="sex" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" required>
                      <option selected>@lang('public.sex')</option>
                      <option>ذكر</option>
                      <option >انثى</option>
                    
                    </select>
                </div>

                <div class="mb-3 col-3">
                  <label for="exampleInputPassword1" class="form-label">الوظيفة</label>
                  <select name="role" id="role" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" required>
                      
                      <option value="teacher">معلم</option>
                      <option value="admin">مشرف</option>
                    
                    </select>
                </div>

                
  
                <div class="mb-3 col-3">
                  <label for="exampleInputPassword1" class="form-label">@lang('public.levelc')</label>
                  <select name="level" id="level" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" required>
                      {{-- <option selected>@lang('public.levelc')</option> --}}
                      
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
                  <label for="exampleInputPassword1" class="form-label">@lang('public.ts')</label>
                  <input type="text" class="form-control" required name="spce" id="spce" required>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('public.logout')</button>
            <button type="submit" class="btn btn-primary col-6" data-bs-dismiss="modal">@lang('public.save')</button>
          </div>       
        </div>
        </form>
  
      
    </div>
  </div>
</div>

</div>



{{-- update modal start --}}



      <!-- Modal -->
      <div style=" @lang('public.dirl')" class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-center" id="staticBackdropLabel">@lang('public.addteacher')</h5>
              {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body">
              <form  id="upload_form2" method="POST" >
                @csrf
                <h3 class="text-center">@lang('public.teachers')</h3>
                <br>
        
               
                <br>
        
                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="exampleInputEmail1" class="form-label">@lang('public.nameteacher')</label>
                        <input type="text" name="name" required class="form-control" id="name1" aria-describedby="emailHelp">
                        <input type="text" name="id" class="form-control" hidden id="id1" aria-describedby="emailHelp">
                      </div>
                  
                      
                      <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">@lang('public.numberphone')</label>
                        <input type="number" required class="form-control" name="phone" id="phone1">
                        
                      </div>
                      {{-- <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">@lang('public.tatol')</label>
                        <input type="number" required class="form-control" name="price" id="price1" >
                      </div>
                       --}}
                      {{-- <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">@lang('public.local2')</label>
                        <input type="text" required class="form-control" name="location" id="location1">
                      </div>
         --}}
                      {{-- <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">@lang('public.date')</label>
                        <input type="date" required class="form-control" name="brit" id="brit1">
                      </div>
                       --}}
                      <div class="mb-3 col-3">
                        <select name="matrail" id="matrail1" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                          <option selected>@lang('public.subjectselect')</option>
                         
                          <option >القران كريم</option>
                          <option >التربية اسلامية</option> 
                          <option >اللغة عربية</option>
                          <option >اللغة الانجليزية</option>
                          <option >رياضيات</option>
                          <option >علوم</option>
                          <option >اجتماعيات</option>
                          <option >فيزياء</option>
                          <option >كيمياء</option>
                          <option >احياء</option>
                          <option >التاريخ</option>
                          <option >الجغرافيا</option>
                          <option >المجتمع</option>
                          <option >الكمبيوتر</option>
                          <option >السلوك</option>
                          
                        </select>
                      </div>   
                      <div class="mb-3 col-3">
                        
                        <select name="sex" id="sex1" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                            <option selected>@lang('public.sex')</option>
                            <option>ذكر</option>
                            <option >انثى</option>
                          
                          </select>
                      </div>
                      <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">@lang('public.ts')</label>
                        <input type="text" class="form-control" name="spce"  id="spce1">
                      </div>
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
                      <br>
                      
                </div>
                
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('public.logout')</button>
                  <button  type="submit" class="btn btn-primary col-6">@lang('public.save')</button>
                </div>       
              </div>
              </form>
        
            
          </div>
        </div>
      </div>
      </div>

{{-- end update modal  --}}




{{-- delete modal --}}

<!-- Modal -->
<div style=" @lang('public.dirl')" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">@lang('public.del')</h5>
        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
      </div>
      <div class="modal-body">
        @lang('public.mesdel')
        <input type="text" hidden id="idd" > 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('public.logout')</button>
        <button type="button" id="save" class="btn btn-primary">@lang('public.save')</button>
      </div>
    </div>
  </div>
</div>




{{-- end delete modal --}}


<hr>
      <div class="row printviwe v">
@foreach ($users as $post )
  

        <div class="col-4"><span>@lang('public.nameman'):::  </span>{{ $post->namemanager }}</div>
        <div class="col-4"><span>@lang('public.titelm'):::  </span>{{ $post->title }}</div>
        <div class="col-4"><span>@lang('public.namesma') :::  </span>{{ $post->nameanent }}</div>
       <div class="row text-center">
        <br>
        <div class="col-12">{{ $post->nameschool }}</div>
       </div>
        @endforeach
      </div>

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
      url:'{{ URL::to('exportTeacher') }}',
      success:function(){
        
       toastr.options =
 {
   "closeButton" : true,
   "progressBar" : true
 }
     
     toastr.info("تم انشاء نسخة Excel للمعلمين");
    
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


<script>
  $(document).on('click','#pr',function(){
  // alert('aaa');
  $('.toggled').removeClass("toggled");
            $('.imgall').removeClass("imgall");
            $('.v').removeClass("printviwe");
            
            print();
            $( ".showimg" ).addClass("imgall");
            $('#wrapper').addClass("toggled");
          
          $( ".v" ).addClass("printviwe");         
            // hideclass();

        });
</script>



<script>

$(document).on('click','.editv',function(){
    var id = $(this).data('id');
    // alert(id);

    $('#idd').val(id);
$('#exampleModal').modal('show');

  });
</script>

<script>
  $(document).on('click','#save',function(){

    var id = $('#idd').val();
// alert(id);
    $.ajax({
      type:'get',
      url:'{{ URL::to('deleteteacher') }}',
      data:{'id':id},
      success:function(){
        $('#exampleModal').modal('hide');
        showalldata();
        toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		// toastr.success("{{ session('message') }}");
      
  		toastr.info("تم الحذف");
      // toastr.warning("{{ session('warning') }}");
      // toastr.error("{{ session('error') }}");
      
      }
    });


    function showalldata(){


$.ajax({
      type:'get',
      url:'{{ URL::to('viewbody') }}',
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
  
  // viewbody
  $(document).ready(function(){
    showalldata();
    function showalldata(){


$.ajax({
      type:'get',
      url:'{{ URL::to('viewbody') }}',
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
      url:'{{ URL::to('searchTeacher') }}',
      data:{'searchTeacher':value},
      success:function(data){
        $('#datares').html(data);
      }
    });



    }else{
$('.serall').hide();
  $('.alldata').show();
    }
    





  });
</script>
{{-- view edit --}}
<script>
  // staticBackdrop2
// document
$(document).on('click','.edit',function(){

  var level = $(this).data('level');
  var phone = $(this).data('phone');
  var id = $(this).data('id');
  var matrail = $(this).data('matrail');
  var spce = $(this).data('spce');
  var sex = $(this).data('sex');
  var location = $(this).data('location');
  var brit = $(this).data('brit');
  var name = $(this).data('name');
  var price = $(this).data('price');
  
  $('#staticBackdrop2').modal('show');
  $('#brit1').val(brit);
  $('#location1').val(location);
  $('#sex1').val(sex);
  $('#spce1').val(spce);
  $('#matrail1').val(matrail);
  $('#id1').val(id);
  $('#phone1').val(phone);
  $('#level1').val(level);
  $('#name1').val(name);
  $('#price1').val(price);
  


});

</script>

<script>
  $('#upload_form2').on('submit',function(e){

e.preventDefault();
// action="{{ route('insertsessions') }}"
$.ajax({
url:"{{ route('update') }}",
method:'POST',
data:new FormData(this),
dataType:'JSON',
contentType:false,
cache:false,
processData:false,
success:function(){

  
}

});

$('#staticBackdrop2').modal('hide');
      $('.modal-backdrop').removeClass("modal-backdrop");
  toastr.options =
{
"closeButton" : true,
"progressBar" : true
}
// toastr.success("{{ session('message') }}");
// toastr.options.showEasing = 'swing';
toastr.info("تم التعديل");
showalldata();
function showalldata(){


$.ajax({
      type:'get',
      url:'{{ URL::to('viewbody') }}',
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

 $('#saveupdate').on('click',function(){
  var brit=  $('#brit1').val();
var location=  $('#location1').val();
  var sex= $('#sex1').val();
 var spce= $('#spce1').val();
 var matrail= $('#matrail1').val();
 var id= $('#id1').val();
 var phone= $('#phone1').val();
 var level= $('#level1').val();
 var name = $('#name1').val();
 var price = $('#price1').val();
    // alert(id);
    // alert(brit);
    // alert(location);
    // alert(sex);
    // alert(spce);
    // alert(matrail);
    // alert(phone);
    // alert(level);
    // alert(name);
    // alert(phone);
    $.ajax({
      type:'get',
      url:'{{ URL::to('update') }}',
      data:{'name':name,'price':price,'level':level,'phone':phone,
      'id':id,'matrail':matrail,'spce':spce,'sex':sex,'location':location,'brit':brit},
      success:function(){
        // $('#datares').html(data);
        showalldata();
        $('#staticBackdrop2').modal('hide');
        toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		// toastr.success("{{ session('message') }}");
      
  		toastr.info("saveupdate");
      // toastr.warning("{{ session('warning') }}");
      // toastr.error("{{ session('error') }}");
     
      }
    });

    function showalldata(){
      

$.ajax({
      type:'get',
      url:'{{ URL::to('viewbody') }}',
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
   var brit=  $('#brit').val();
 var location=  $('#location').val();
   var sex= $('#sex').val();
  var spce= $('#spce').val();
  var matrail= $('#matrail').val();
  var id= $('#id').val();
  var phone= $('#phone').val();
  var level= $('#level').val();
  var name = $('#name').val();
  var price = $('#price').val();
  var password = $('#password').val();
              
    //  alert(name);
    //  alert(brit);
    //  alert(price);
    //  alert(location);
    //  alert(sex);
    //  alert(spce);
    //  alert(matrail);
    //  alert(phone);
    //  alert(level);
    //  alert(password); //saveteacher
     $.ajax({
       type:'get',
       url:'{{ URL::to('teacher') }}',
       data:{'name':name,'price':price,'level':level,'phone':phone,
       'matrail':matrail,'spce':spce,'sex':sex,'location':location,'brit':brit,'password':password},
       success:function(){
         // $('#datares').html(data);
        //  $('#staticBackdrop').modal('hide');
        //  $('#editmodel').modal('hide');
    
         
         toastr.options =
   {
     "closeButton" : true,
     "progressBar" : true
   }
       // toastr.success("{{ session('message') }}");
       
       toastr.info("تم الحفظ");
       // toastr.warning("{{ session('warning') }}");
       // toastr.error("{{ session('error') }}");
      
       }
     });
    //  $('#add')[0].reset();
         showalldata();
     function showalldata(){
       
 
 $.ajax({
       type:'get',
       url:'{{ URL::to('viewbody') }}',
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
    url:"{{ route('saveteacher') }}",
    method:'POST',
    data:new FormData(this),
    dataType:'JSON',
    contentType:false,
    cache:false,
    processData:false,
    success:function(){
  
      $('#staticBackdrop').modal('hide');
          $('.modal-backdrop').removeClass("modal-backdrop");
      toastr.options =
  {
  "closeButton" : true,
  "progressBar" : true
  }
  // toastr.success("{{ session('message') }}");
  
  toastr.info("تم اضافة الصف");
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
  
  toastr.info("تم اضافة المعلم");
  showalldata();
    function showalldata(){


$.ajax({
      type:'get',
      url:'{{ URL::to('viewbody') }}',
      // data:{'search':$value},

      success:function(data){
        console.log(data);
        $('#alldata').html(data);
      }


    });

      }
   });
  
  </script>
  


@endsection