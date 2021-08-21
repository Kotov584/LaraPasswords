@extends('dashboard.layouts.dashboard')

@section('page_header') 
<div class="page-header d-print-none">
            <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    This is my page title
                </h2>
                <div class="text-muted mt-1">This is description with of page with muted text</div>
            </div>
            <!-- Page title actions -->
            <form method="post" action="/dashboard/passwords/search" class="col-auto ms-auto d-print-none">
              @csrf
                <div class="d-flex">
                  <input type="search" class="form-control d-inline-block w-9 me-3" placeholder="Search password…"/>
                  <a href="#" class="btn btn-primary">
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
    <p>This is my body content.</p>
@endsection
