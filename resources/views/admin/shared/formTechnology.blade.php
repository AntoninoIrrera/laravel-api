<div class="container">
    <form action="{{ route($route, $technology->id) }}" method="POST" class="mt-3" enctype="multipart/form-data">

        @csrf
        @method($methodRoute)

        <div class="mb-3">

            <label class="form-label" for="name">Inserisci il nome</label>
            <input class="form-control {{$errors->has('name') ? 'is-invalid' : '' }}" type="text" value="{{old('name',$technology->name)}}" name="name" id="name">
            @if($errors->has('name'))
            <div class="alert alert-danger mt-3">
                @foreach ($errors->get('name') as $error)
                {{$error}}
                @endforeach
            </div>
            @endif

        </div>

        <div class="mb-3">

            <label class="form-label" for="color">Inserisci il colore</label>
            <input class="form-control {{$errors->has('color') ? 'is-invalid' : '' }}" type="color" value="{{old('color',$technology->color)}}" name="color" id="color">
            @if($errors->has('color'))
            <div class="alert alert-danger mt-3">
                @foreach ($errors->get('color') as $error)
                {{$error}}
                @endforeach
            </div>
            @endif

        </div>

        <div class="mb-3">

            <label class="form-label" for="image">Inserisci un URL di un'immagine</label>
            <input class="form-control {{$errors->has('image') ? 'is-invalid' : '' }}" type="url" value="{{old('image',$technology->image)}}" name="image" id="image">
            @if($errors->has('image'))
            <div class="alert alert-danger mt-3">
                @foreach ($errors->get('image') as $error)
                {{$error}}
                @endforeach
            </div>
            @endif

        </div>


        <div class="mb-3">

            <label class="form-label" for="versione">Inserisci la versione</label>
            <input class="form-control {{$errors->has('versione') ? 'is-invalid' : '' }}" type="text" value="{{old('versione',$technology->versione)}}" name="versione" id="versione">
            @if($errors->has('versione'))
            <div class="alert alert-danger mt-3">
                @foreach ($errors->get('versione') as $error)
                {{$error}}
                @endforeach
            </div>
            @endif

        </div>





        <div class="mb-3">
            <button type="submit" class="btn btn-success">{{$bottone}}</button>
        </div>
    </form>
</div>