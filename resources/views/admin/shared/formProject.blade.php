<div class="container">
    <form action="{{ route($route, $project->id) }}" method="POST" class="mt-3" enctype="multipart/form-data">

        @csrf
        @method($methodRoute)

        <div class="mb-3">

            <label class="form-label" for="title">Inserisci il titolo</label>
            <input class="form-control {{$errors->has('title') ? 'is-invalid' : '' }}" type="text" value="{{old('title',$project->title)}}" name="title" id="title">
            @if($errors->has('title'))
            <div class="alert alert-danger mt-3">
                @foreach ($errors->get('title') as $error)
                {{$error}}
                @endforeach
            </div>
            @endif

        </div>

        <div class="mb-3">

            <label class="form-label" for="type">Inserisci il type</label>
            <select class="form-control {{$errors->has('type_id') ? 'is-invalid' : '' }} " name="type_id" id="type">
                @foreach($types as $type)
                <option value="{{$type->id}}" {{ old('type_id',$project->type_id) == $type->id ? 'selected' : '' }}>{{$type->name}}</option>
                @endforeach
            </select>
            @if($errors->has('type_id'))
            <div class="alert alert-danger mt-3">
                @foreach ($errors->get('type_id') as $error)
                {{$error}}
                @endforeach
            </div>
            @endif

        </div>

        <div class="mb-3">
            @foreach($technologies as $technology)
            <input type="checkbox" class="form-check-input {{$errors->has('technologies') ? 'is-invalid' : '' }} " name="technologies[]" value="{{$technology->id}}" 
            @if($errors->any())
            @checked(in_array($technology->id,old('technologies',[])))
            @else
            @checked($project->technologies->contains($technology->id))
            @endif
            >

            <label class="form-check-label"> {{$technology->name}} </label>
            @endforeach
            @if($errors->has('technologies'))
            <div class="alert alert-danger mt-3">
                @foreach ($errors->get('technologies') as $error)
                {{$error}}
                @endforeach
            </div>
            @endif

        </div>



        <div class="mb-3">

            <label class="form-label" for="relase_date">Inserisci la data</label>
            <input class="form-control {{$errors->has('relase_date') ? 'is-invalid' : '' }}" type="date" value="{{old('relase_date',$project->relase_date)}}" name="relase_date" id="relase_date">
            @if($errors->has('relase_date'))
            <div class="alert alert-danger mt-3">
                @foreach ($errors->get('relase_date') as $error)
                {{$error}}
                @endforeach
            </div>
            @endif
        </div>

        <div class="mb-3">

            <label class="form-label" for="description">Inserisci la descrizione</label>
            <textarea class="form-control {{$errors->has('description') ? 'is-invalid' : ''}} " name="description" id="description" cols="30" rows="10">{{old('description',$project->description)}}</textarea>
            @if($errors->has('description'))
            <div class="alert alert-danger mt-3">
                @foreach ($errors->get('description') as $error)
                {{$error}}
                @endforeach
            </div>
            @endif
        </div>


        <div class="mb-3">

            <label class="form-label" for="image">Inserisci l'immagine</label>
            <input class="form-control {{$errors->has('image') ? 'is-invalid' : '' }}" type="file" name="image" id="image">
            @if($errors->has('image'))
            <div class="alert alert-danger mt-3">
                @foreach ($errors->get('image') as $error)
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