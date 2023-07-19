@extends('layouts.boot')

@section('content')


<head>
    <style>
        @media print{
            
            
            #search,#bot,#pr,#sidebar-wrapper{
                display: none;
            }
            .navbar,.icon,.iconc{
                display: none;
            }

        }

        .img,.printviwe,.vo{
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
        @lang('public.addpay')
      </button>
      {{-- exampleModal2 --}}
    </div>
  
    @endif
    
    <div class="col-1">
        <button type="button" class="btn btn-secondary " id="pr">
            <i title="طباعة" style="font-size: 20px" class="fa fa-print" aria-hidden="true"></i>
        </button>
        
      </div>
      <div class="col-3">

        <button type="button" id="bot" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal2">
          @lang('public.toall')
        </button>
        {{-- exampleModal2 --}}
      </div>   
  @foreach ($users as $post)
  <div class="text-center img">
    <img  src="{{ asset('images/'.$post->img) }}" alt="" width="100px" height="100px">
  </div>
  <br>
  @endforeach
        
        
        
        <br>
  <h5 class="text-center">@lang('public.acostudent')</h5>
        
    <br><br>   



<table class="table table-bordered table-hover">
    <thead class="text-center">
      <?php $sum=0;$sumpay=0;$allsum=0; $name;?>
      <tr>
        {{-- <th scope="col">#</th> --}}
        <th class="text-center" scope="col">@lang('public.namestudent')</th>
        <th class="text-center"  scope="col">@lang('public.pay1')</th>
        <th class="text-center" scope="col">@lang('public.tatol')</th>
        {{-- <th scope="col">اجمالي المدفوع</th> --}}
        <th class="text-center" scope="col">@lang('public.pkk')</th>
        <th class="text-center"  scope="col">@lang('public.datepay')</th>
        <th class="text-center iconc"  scope="col">@lang('public.control')</th>
      </tr>
    </thead>


    
    <tbody class="alldata text-center" id="alldata">
      
    </tbody>
    <tbody id="datares" class="serall  text-center"> 
      
    </tbody>
    </table>


</table>
    
                {{-- add not  --}}

<!-- Modal -->
<div style=" @lang('public.dirl')" class="modal fade"  id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">@lang('public.ddpay')</h5>
        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
      </div>
      <div class="modal-body">
        <h6 class="text-center border "> @lang('public.toall') ::{{ $user  }}</h6>
        <input type="text" hidden id="id1d" > 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('public.logout')</button>
        {{-- <button type="button" id="remove" class="btn btn-primary">حفظ</button> --}}
      </div>
    </div>
  </div>
</div>

{{-- end delete modal --}}

        
      <!-- Modal -->
<div style=" @lang('public.dirl')" class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="staticBackdropLabel">@lang('public.addpay')</h5>
          {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
        </div>
        <div class="modal-body">
          <form id="add" action="javascript:void(0)">
            {{-- <form action="{{ route('insertcar') }}"  method="POST"> --}}
              @csrf
           
            
        <br><br>
            <div class="row">
                <div class="mb-3 col-6">
                    {{-- <label for="exampleInputPassword1" class="form-label">اجمالي مبلغ التسجيل</label> --}}
                    <input type="number" class="form-control" name="pay" id="pay" placeholder="ادخال المبلغ" required>
                  </div>
        
                  <div class="mb-3 col-4">
                        
                    <select   name="name" id="name" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option  selected>@lang('public.selectstudent')</option>
                        @foreach ($stu as $post )
                        
                        <option  value="{{ $post->id }}" >{{ $post->name }}</option>
                        {{-- <input  type="text" hidden id="namestudnt" value="{{ $post->name }}" name="namestudnt"> --}}
                        
                        @endforeach      
                      
                      </select>

                    
                      
                  
                  </div>

                  
                  <div class="mb-3 col-4">
                        
                    <select required  name="date" id="date" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option  selected> @lang('public.typay')</option>
                        
                        
                        <option> ريال يمني</option>
                        <option> ريال سعودي</option>
                        <option> دولار</option>
                        <option> $</option>
                      </select>
                  
                  </div>
           
              
  
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('public.logout')</button>
                      <button id="save" class="btn btn-primary col-6" >@lang('public.save')</button>
                    </div> 
            
                  </div>
                        
      
      </form>
        
      </div>
    </div>
  </div>
  </div>
  </div>
</div>
{{-- end add not  --}}








                {{-- update  --}}

        
      <!-- Modal -->
      <div style=" @lang('public.dirl')" class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-center" id="staticBackdropLabel">@lang('public.addpay')</h5>
              {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body">
              <form id="add" action="javascript:void(0)">
                {{-- <form action="{{ route('insertcar') }}"  method="POST"> --}}
                  @csrf
               
                
            <br><br>
                <div class="row">
                    <div class="mb-3 col-6">
                        {{-- <label for="exampleInputPassword1" class="form-label">اجمالي مبلغ التسجيل</label> --}}
                        <input type="text" id="id1" hidden name="id1">
                        <input type="number" class="form-control" name="pay" id="pay1" placeholder="@lang('public.addpay')" required>
                      </div>
            
           
                  
      
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('public.logout')</button>
                          <button id="update" class="btn btn-primary col-6" >@lang('public.save')</button>
                        </div> 
                
                      </div>      
          
          </form>
            
          </div>
        </div>
      </div>
      </div>
      </div>
    </div>
    {{-- end update  --}}
    
    


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
          <input type="text" hidden id="id1d" > 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('public.logout')</button>
          <button type="button" id="remove" class="btn btn-primary">@lang('public.save')</button>
        </div>
      </div>
    </div>
  </div>
  
  {{-- end delete modal --}}


<div id="allprint"></div>


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
      <div class="alert alert-primary" role="alert">
          {{ Session::get('message'); }}
      </div>
      @endif
      @if (Session::has('error'))
      <div class="alert alert-danger" role="alert">
          {{ Session::get('error'); }}
      </div>
      @endif

</div>


<script>
    $(document).ready(function(){
        getall();


        // // printacount
        // $(document).on('click','#printsingel',function(){
          
          
        //   var namestudnt = $(this).data('namestudnt');
        //   // alert(id);
        //   $.ajax({
        //     type:'get',
        //     url:'{{ URL::to('printacount') }}',
        //     data:{'namestudnt':namestudnt},
        //     success:function(data){
        //       $('.toggled').removeClass("toggled");
        //       // document.location.href='printacount';
        //       // return data;
        //       // $('#allprint').html(data);

        //     }
        //   });

        // });

//print
        $(document).on('click','#pr',function(){
            $('.toggled').removeClass("toggled");
            $('.img').removeClass("img");
            $('.v').removeClass("printviwe");
            $('.bo').removeClass("vo");
             
            print();
            $( "img" ).addClass("img");
            $('.bo').addClass("vo");
            $('#wrapper').addClass("toggled");
          $( ".v" ).addClass("printviwe");     


        });


        $(document).on('click','#save',function(){

var name = $('#name').val();
var date = $('#date').val();
var pay = $('#pay').val();
var namestudnt = $('#namestudnt').val();

$.ajax({
    type:'get',
    url:'{{ URL::to('acountstudentsave') }}',
    data:{'name':name,'date':date,'pay':pay,'namestudnt':namestudnt},
    success:function(){
        $('#staticBackdrop').modal('hide');
    $('.modal-backdrop').removeClass("modal-backdrop");
    getall();
    toastr.options =
{
"closeButton" : true,
"progressBar" : true
}
// toastr.success("{{ session('message') }}");

toastr.info("تم اضافة مبلغ الي الطالب::::");
    }
});

});


///updateacount/

$(document).on('click','#update',function(){

    // updateacount
var pay = $('#pay1').val();
var id = $('#id1').val();

$.ajax({
    type:'get',
    url:'{{ URL::to('updateacount') }}',
    data:{'pay':pay,'id':id},
    success:function(){
        $('#staticBackdrop2').modal('hide');
    $('.modal-backdrop').removeClass("modal-backdrop");
    getall();
    toastr.options =
{
"closeButton" : true,
"progressBar" : true
}
// toastr.success("{{ session('message') }}");

toastr.info("تم تعديل مبلغ ::::");
    }
});

});

$(document).on('click','#remove',function(){

  
var id = $('#id1d').val();

    // deleteacount

    $.ajax({
    type:'get',
    url:'{{ URL::to('deleteacount') }}',
    data:{'id':id},
    success:function(){
        $('#exampleModal').modal('hide');
    $('.modal-backdrop').removeClass("modal-backdrop");
    getall();
    toastr.options =
{
"closeButton" : true,
"progressBar" : true
}
// toastr.success("{{ session('message') }}");

toastr.info("تم الحذف ::::");
    }
});


});

// view update
$(document).on('click','.edit',function(){

    var pay = $(this).data('pay');
    var id = $(this).data('id');
    // alert(id);
    $('#pay1').val(pay);
    $('#id1').val(id);

    $('#staticBackdrop2').modal('show');



});

//view remove
$(document).on('click','.editv',function(){

var pay = $(this).data('pay');
var id = $(this).data('id');
// alert(id);
$('#pay1').val(pay);
$('#id1d').val(id);

$('#exampleModal').modal('show');



});


// //// update
// $(document).on('click','#update',function(){




// });



// //// remove
// $(document).on('click','#remove',function(){




// });

///end update


////////////////search
    
$('#search').on('keyup',function(){

var value = $(this).val();
//     type:'get',
// url:'{{ URL::to('searchemp') }}',
// data:{'searchemp':value},
// alert(value);datares

if(value != ''){
    $('.alldata').hide();
  $('.serall').show();


$.ajax({
  type:'get',
  url:'{{ URL::to('searchacount') }}',
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





   
function getall(){
 $.ajax({
   type:'get',
   url:'{{ URL::to('acountstudentshow') }}',
   success:function(data){
     $('#alldata').html(data);
   }
 });
}

////end ////////////////////////
    
    });
</script>
@endsection