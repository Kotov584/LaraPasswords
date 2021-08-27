@extends('dashboard.layouts.dashboard')

@section('page_header') 
<div class="page-header d-print-none">
            <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Passwords
                </h2>
                <div class="text-muted mt-1">{{ $passwords->firstItem() }}-{{ $passwords->lastItem() }} of {{ $passwords->total() }} passwords</div>
            </div>
            <!-- Page title actions -->
            <form method="post" action="/dashboard/passwords/search" class="col-auto ms-auto d-print-none">
              @csrf
                <div class="d-flex">
                  <input type="search" class="form-control d-inline-block w-9 me-3" placeholder="Search password…"/>
                  <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-add-new-password">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                    New password
                  </a>
                </div>
            </form>
            </div>
          </div>
@endsection 

@section('content') 
<div class="row row-cards">
            @foreach ($passwords as $password)
              <div class="col-md-6 col-lg-3">
                <div class="card">
                  <div class="card-body p-4 text-center">
                    <span class="avatar avatar-xl mb-3 avatar-rounded" style="background-image: url({{ $password->image }})"></span>
                    <h3 class="m-0 mb-1"><a href="/dashboard/passwords/{{ $password->id }}">{{ $password->name }}</a></h3>
                    <div class="text-muted">{{ $password->description }}</div> 
                  </div>
                  <div class="d-flex">
                    <a href="#" onclick="copy_text('{{ $password->password }}')" class="card-btn"><!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="8" y="8" width="12" height="12" rx="2" /><path d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2" /></svg> 
                      Copy</a> 
                  </div>
                </div>
              </div> 
            @endforeach
            </div>


            <div class="d-flex mt-4">
              <ul class="pagination ms-auto">
                <li class="page-item @if($passwords->onFirstPage()) disabled @endif">
                  <a class="page-link" href="{{ $passwords->previousPageUrl() }}" tabindex="-1" aria-disabled="">
                    <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="15 6 9 12 15 18" /></svg>
                    prev
                  </a>
                </li>
                @foreach ($passwords->getUrlRange(1, $passwords->lastPage()) as $key => $page)
                  <li class="page-item @if ($passwords->currentPage() == $key) active @endif"><a class="page-link" href="{{ $page }}">{{ $key }}</a></li> 
                @endforeach 
                <li class="page-item @if(!$passwords->hasMorePages()) disabled @endif">
                  <a class="page-link" href="{{ $passwords->nextPageUrl() }}">
                    next <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="9 6 15 12 9 18" /></svg>
                  </a>

                </li>
              </ul>
            </div>
@endsection

@section('modals') 
<div class="modal modal-blur fade" id="modal-add-new-password" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        
      <form method="post" action="/dashboard/passwords" class="modal-content">
        @csrf
        <input name="image" value="test" type="hidden" class="form-control"/>
        <input name="user_id" value="1" type="hidden" class="form-control"/>
          <div class="modal-header">
            <h5 class="modal-title">Add a new password</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row mb-3 align-items-end">
              <div class="col-auto">
                <a href="#" class="avatar avatar-upload rounded"> 
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                  <span class="avatar-upload-text">Add</span>
                </a>
              </div>
              <div class="col">
                <label class="form-label">Name</label>
                <input name="name" type="text" class="form-control" />
              </div>
            </div> 
            <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select name="category_id" type="text" class="form-select" placeholder="Select a date" id="select-tags" value="">
                              @foreach ($categories as $category) 
                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                              @endforeach 
                            </select>
            </div>
            <div class="row mb-3 align-items-end"> 
              <div class="col">
                <label class="form-label">Password</label>
                <input name="password" type="text" class="form-control" />
              </div>
              <div class="col">
                <label class="form-label">Repeat Password</label>
                <input name="password_confirmation" type="text" class="form-control" />
              </div>
            </div> 
            <div>
              <label class="form-label">Description</label>
              <textarea name="description" class="form-control"></textarea>
            </div><br>
            <div>
              <label class="form-label">Note</label>
              <textarea name="note" class="form-control"></textarea>
            </div> 
          </div>
          <div class="modal-footer">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Password</button>
          </div>
        </form>

      </div>
    </div>
@endsection
@section('scripts')
<script src="/dist/js/sweetalert.js"></script>
<script>
  function copy_text(text) {  
    navigator.clipboard.writeText(text);
    Swal.fire({
      title: 'Copied the password',
      text: text,
      icon: 'success',
      confirmButtonText: 'Ok'
    });
  }
</script>
@endsection