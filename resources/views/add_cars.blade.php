<!DOCTYPE html>
<html lang="{{LaravelLocalization::getCurrentLocale()}}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head> 
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{__('cars.AddHeading')}}</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
    rel="stylesheet">
  <style>
    * {
      font-family: "Lato", sans-serif;
    }

    input[type=file]{
    width:100px;
    color:transparent;
}



  </style>
</head>

<body>
  <main>
    <div class="container my-5">
      <div class="bg-light p-5 rounded">
     <span> <a href="{{ LaravelLocalization::getLocalizedURL('en') }}">English</a></span>
      <span><a href="{{ LaravelLocalization::getLocalizedURL('ar') }}">عربي</a></span>
        <h2 class="fw-bold fs-2 mb-5 pb-2">{{__('cars.AddHeading')}}</h2>
        <form action="{{route('cars.store')}}" method="POST" class="px-md-5" enctype="multipart/form-data">
          @csrf
          <div class="form-group mb-3 row">
            <label for="" class="form-label col-md-2 fw-bold text-md-end">{{__('cars.CarTitle')}}</label>
            <div class="col-md-10">
              <input type="text" placeholder="{{__('cars.CarTitle')}}" class="form-control py-2" name="carTitle"  value="{{old('carTitle')}}"/>
             @error('carTitle')
                <div class="alert alert-warning">{{$message}}</div>
             @enderror
             </div>
           
          </div>
          <div class="form-group mb-3 row">
            <label for="" class="form-label col-md-2 fw-bold text-md-end">{{__('cars.price')}}</label>
            <div class="col-md-10">
              <input type="number" step="0.1" placeholder="{{__('cars.addPrice')}}" class="form-control py-2" name="price"  value="{{old('price')}}"/>
              @error('price')
                 <div class="alert alert-warning">{{$message}}</div>
             @enderror
            </div>
          </div>
          <div class="form-group mb-3 row">
            <label for="" class="form-label col-md-2 fw-bold text-md-end">{{__('cars.Category')}}</label>
            <div class="col-md-10">
              <select name="category_id" id="" class="form-control">
                <option value="">{{__('cars.selectCategory')}}</option>
              @foreach($categories as $category)
                <option value="{{$category->id}}" @selected(old('category_id') == $category->id) >{{$category->category_name}}</option>
              @endforeach
              </select>
              @error('category_id')
                <div class="alert alert-warning">{{$message}}</div>
              @enderror
            </div>
          </div>
          <div class="form-group mb-3 row">
            <label for="" class="form-label col-md-2 fw-bold text-md-end">{{__('cars.Description')}}</label>
            <div class="col-md-10">
              <textarea id="" cols="30" rows="5" class="form-control py-2" name="description">{{old('description')}}</textarea>
              @error('description')
                 <div class="alert alert-warning">{{$message}}</div>
             @enderror
            </div>
          </div>
          <hr>
          
          <div class="container">
              <div class="form-group mb-3 " >
                  <label class="form-label col-md-2 fw-bold text-md-end" for="image">{{__('cars.image')}}</label>
                  <label for="file-input" class="btn btn-primary">{{__('cars.carLablePhoto')}}</label>
                  <input type="file" id="file-input" style="display: none;" name="image" title = "{{__('cars.imageinsert')}}"/>
                  <span  id="file-name" class="ml-2" >{{__('cars.carSpanPhoto')}}</span>
              </div>
              @error('image')
                <div class="alert alert-warning" >{{__('cars.imageinsert')}}</div>
            @enderror
          </div>

         <hr>
          <div class="form-group mb-3 row">
            <label for="" class="form-label col-md-2 fw-bold text-md-end">{{__('cars.Published')}}</label>
            <div class="col-md-10">
              <input type="checkbox" class="form-check-input" style="padding: 0.7rem;" name="published" @checked(old('published')) />
            </div>
          </div>
          <div class="text-md-end">
            <button class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">
            {{__('cars.AddHeading')}}
            </button>
          </div>
        </form>
      </div>
    </div>
  </main>
  
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script>
    document.getElementById('file-input').addEventListener('change', function(event) {
        var fileName = event.target.files.length ? event.target.files[0].name : "لم يتم اختيار أي ملف";
        document.getElementById('file-name').textContent = fileName;
    });

    // Trigger file input dialog on label click
    document.querySelector('label[for="file-input"]').addEventListener('click', function() {
        document.getElementById('file-input').click();
    });
</script>
<style>
    label {
        
        color: black;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
        display: inline-block;
    }

    #file-name {
        margin-top: 10px;
        display: inline-block;
    }
    #file-input{

      display: inline-block;
    }
    
</style>

</html>