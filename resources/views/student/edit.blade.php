<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    <form method="POST" action="{{ route('student.update', $student) }}">
        @csrf
        @method('put')


        <div class="mb-3">
            <label for="name"class="form-label">Name</label>
            <input type="text"class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name', $student->name) }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nim"class="form-label">Nim</label>
            <input type="text"class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim"
                value="{{ old('nim', $student->nim) }}">
            @error('nim')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <a class="btn btn-primary mb-3" href="{{ route('student.edit', $student->id) }}" role="button">Edit Student</a>
    </form>

</x-app>
