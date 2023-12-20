@csrf
<div class="row">
    <div class="col">
        <!-- name -->
        <div class="form-group">
            <label class="form-label" for="name">Nombre:</label>
            <input class="form-control" type="text" id="name" name="name" placeholder="Nombre del perro"
                value="{{ old('name', $dog) }}">
            @error('name')
                <div class="text-xs text-red">{{ $message }}</div>
            @enderror
        </div>

        <!-- sex -->
        <div class="form-group">
            <label class="form-label" for="sex">Sexo:</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sex" id="male" value="M"
                    @checked(old('sex', $dog) == 'M') checked>
                <label class="form-check-label" for="male">
                    Macho
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sex" id="female" value="F"
                    @checked(old('sex', $dog) == 'F')>
                <label class="form-check-label" for="female">
                    Hembra
                </label>
            </div>
            @error('sex')
                <div class="text-xs text-red">{{ $message }}</div>
            @enderror
        </div>

        <!-- race -->
        <div class="form-group">
            <label class="form-label" for="race">Raza:</label>
            <select      id="race" name="race">
                <option value="" selected>Seleccione la raza</option>
                <option value="Criollo" @selected(old('race', $dog) == 'Criollo')>Criollo
                </option>
                <option value="Husky siberiano" @selected(old('race', $dog) == 'Husky siberiano')>Husky siberiano
                </option>
                <option value="Golden retriever" @selected(old('race', $dog) == 'Golden retriever')>Golden retriever
                </option>
                <option value="Pastor alemán" @selected(old('race', $dog) == 'Pastor alemán')>
                    Pastor alemán</option>
                <option value="Yorkshire terrier" @selected(old('race', $dog) == 'Yorkshire terrier')>Yorkshire terrier
                </option>
                <option value="Dálmata" @selected(old('race', $dog) == 'Dálmata')>
                    Dálmata
                </option>
                <option value="Boxer" @selected(old('race', $dog) == 'Boxer')>Boxer
                </option>
                <option value="Chihuahua" @selected(old('race', $dog) == 'Chihuahua')>
                    Chihuahua</option>
                <option value="Bulldog" @selected(old('race', $dog) == 'Bulldog')>
                    Bulldog</option>
                <option value="Otra" @selected(old('race', $dog) == 'Otra')>Otra
                </option>
            </select>
            @error('race')
                <div class="text-xs text-red">{{ $message }}</div>
            @enderror
        </div>

        <!-- birth_date -->
        <div class="form-group">
            <label class="form-label" for="birth_date">Fecha de nacimiento:</label>
            <input class="form-control" type="date" id="birth_date" name="birth_date" min="2003-01-01"
                max="<?php echo date('Y-m-d'); ?>" placeholder="Fecha de nacimiento" value="{{ old('birth_date', $dog) }}">
            @error('birth_date')
                <div class="text-xs text-red">{{ $message }}</div>
            @enderror
        </div>

        <!-- weight -->
        <div class="form-group">
            <label class="form-label" for="weight">Peso(kg):</label>
            <input class="form-control" type="text" id="weight" name="weight" placeholder="Peso"
                value="{{ old('weight', $dog) }}">
            @error('weight')
                <div class="text-xs text-red">{{ $message }}</div>
            @enderror
        </div>

        <!-- height -->
        <div class="form-group">
            <label class="form-label" for="height">Estatura(cm):</label>
            <input class="form-control" type="text" id="height" name="height" placeholder="Estatura"
                value="{{ old('height', $dog) }}">
            @error('height')
                <div class="text-xs text-red">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            <label class="form-label" for="customFile">Imagen:</label>
            <div class="custom-file">
                <input name="image" type="file" class="custom-file-input" id="customFile"
                    placeholder="Selecciona una imagen" value="{{ old('image', $dog) }}" accept="image/*">
                <label class="custom-file-label" for="customFile">Seleccionar</label>
            </div>
            @error('image')
                <div class="text-xs text-red">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-center">
            <img id="preview-image-before-upload"
                src="@isset($dog) {{ asset('storage/dogs/' . $dog->image) }} @else {{ asset('img/upload-image.png') }} @endisset"
                alt="preview image" style="width: 250px; height: 330px;">
        </div>



    </div>
</div>
<br />
<div class="d-flex justify-content-center">
    <button class="btn btn-primary" type="submit">
        @isset($dog)
            Editar
        @else
            Registrar
        @endisset
    </button>
</div>
<br />
