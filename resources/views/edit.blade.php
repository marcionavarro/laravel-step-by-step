 @extends('layouts.master')

 @section('content')
     @if ($errors->any())
         @foreach ($errors->all() as $errors)
             <div class="alert alert-danger" role="alert">
                 {{ $errors }}
             </div>
         @endforeach
     @endif

     <div class="card mt-5">
         <h5 class="card-header d-flex justify-content-between align-items-center">
             Editar Postagem
             <div>
                 <a href="{{ route('posts.index') }}" class="btn btn-sm btn-success">Voltar</a>
             </div>
         </h5>
         <div class="card-body">
             <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                 @csrf
                 @method('PUT')

                 <div class="form-group mb-3">
                     <label for="" class="form-label">
                         <img src="{{ asset($post->image) }}" alt="" class="img-thumbnail" style="width: 150px;">
                         Imagem
                     </label>
                     <input type="file" name="image" class="form-control">
                 </div>
                 <div class="form-group mb-3">
                     <label for="" class="form-label">Titulo</label>
                     <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                 </div>
                 <div class="form-group mb-3">
                     <label for="" class="form-label">Categoria</label>
                     <select name="category_id" id="" class="form-control">
                         @foreach ($categories as $category)
                             <option value="{{ $category->id }}"
                                 {{ $category->id == $post->category_id ? 'selected' : '' }}>
                                 {{ $category->name }}
                             </option>
                         @endforeach
                     </select>
                 </div>
                 <div class="form-group mb-3">
                     <label for="" class="form-label">Descrição</label>
                     <textarea name="description" class="form-control" cols="30" rows="10">{{ $post->description }}</textarea>
                 </div>

                 <div class="form-group mb-3">
                     <button class="btn btn-lg btn-primary p-3">Editar</button>
                 </div>
             </form>
         </div>
     </div>
 @endsection
