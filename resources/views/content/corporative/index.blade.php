@extends('layouts/contentNavbarLayout')
@section('page-script')
    <script src="{{ asset('assets/js/delete-item.js') }}"></script>
@endsection

@section('content')
    <h4 class="py-3 mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="javascript:void(0);">Կորպորատիվ</a>
                </li>
                <li class="breadcrumb-item active">Ցանկ</li>
            </ol>
        </nav>
    </h4>
    <div class="card">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h5 class="card-header">Կորպորատիվի ցանկ</h5>
            </div>

            <div>
                <a href="{{ route('corporative.create') }}" class="btn btn-primary mx-4">Ստեղծել նոր կորպորատիվ </a>
            </div>

        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Անուն</th>
                            <th>ՀՎՀՀ</th>
                            <th>Ֆայլ</th>
                            <th>Էլ․ հասցե</th>
                            <th>Պայմանագրի համար</th>
                            <th>Տոմսերի քանակ</th>
                            <th>Մնացած տոմսեր</th>
                            <th>Գին</th>
                            <th>Ակտիվ է մինչև</th>
                            <th>Ջնջել</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $corporative)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $corporative->name }}</td>
                                <td>{{ $corporative->tin }}</td>
                                <td>
                                    @if ($corporative->file_path)
                                        <a href="{{route('get-file', ['path' => $corporative->file_path])}}" target="_blank" > 
                                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M16 7C6 7 2 16 2 16C2 16 6 25 16 25C26 25 30 16 30 16C30 16 26 7 16 7Z" stroke="#49536E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M16 21C18.7614 21 21 18.7614 21 16C21 13.2386 18.7614 11 16 11C13.2386 11 11 13.2386 11 16C11 18.7614 13.2386 21 16 21Z" stroke="#49536E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </a>
                                    @endif
                                </td>
                                <td>{{ $corporative->email }}</td>
                                <td>{{ $corporative->contract_number }}</td>
                                <td>{{ $corporative->tickets_count }}</td>
                                <td>{{ $corporative->visitors_count }}</td>
                                <td>{{ $corporative->price }}</td>
                                <td>{{ $corporative->ttl_at }}</td>
                                <td>
                                    <div class="action" data-id="{{ $corporative->id }}" data-tb-name="corporative_sales">
                                        <button type="button" data-bs-toggle="modal" class="dropdown-item click_delete_item"
                                            data-bs-target="#smallModal"><i class="bx bx-trash me-1"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="demo-inline-spacing">
                {{ $data->links() }}
            </div>
        </div>
    </div>
@endsection

<x-modal-delete></x-modal-delete>