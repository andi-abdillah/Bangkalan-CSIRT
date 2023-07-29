@extends('layouts.main')

@section('container')

<div class="flex justify-center py-28">
  <div class="container flex flex-col gap-5">
    @foreach ($profils->take(1) as $profil)
    <h2 class="text-center my-3 text-2xl lg:text-4xl font-bold">RFC2350 {{ $profil->name }}</h2>
    @endforeach
    <hr class="w-1/2 h-1 mx-auto bg-base-content border-0 rounded">
    <div id="my_pdf" class="mx-auto w-3/4"></div>
  </div>
</div>

<script nonce="{{ csp_nonce() }}" src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.7/pdfobject.min.js" integrity="sha512-g16L6hyoieygYYZrtuzScNFXrrbJo/lj9+1AYsw+0CYYYZ6lx5J3x9Yyzsm+D37/7jMIGh0fDqdvyYkNWbuYuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@foreach ($files->take(1) as $file)
<script nonce="{{ csp_nonce() }}">
  PDFObject.embed("{{ asset('storage/' . $file->path) }}", "#my_pdf");
</script>
@endforeach

@endsection