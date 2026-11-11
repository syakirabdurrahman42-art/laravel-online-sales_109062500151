@if(session('success'))
    <div class="card" style="border-left:4px solid #2e7d32">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="card" style="border-left:4px solid #c62828">{{ session('error') }}</div>
@endif

@if($errors->any())
    <div class="card" style="border-left:4px solid #c62828">
        <ul style="margin:0;padding-left:18px">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif