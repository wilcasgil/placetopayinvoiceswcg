@extends('layouts.app')
@section('content')
    <div class="card card-default">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title mb-0">{{ __('clients') }}</h5>
            <a href="{{ route('client.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> {{ __('Create') }}
            </a>
        </div>
        <div class="table-responsive-lg">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Last Name') }}</th>
                        <th>{{ __('Email') }}</th>
                        <th>{{ __('City') }}</th>                        
                        <th>{{ __('Status') }}</th>
                        <th class="text-right"></th>
                    </tr>
                </thead>
                <tbody>
                    @each('client.index.__row', $clients, 'client', 'partials.__empty')
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-3 d-flex justify-content-center">
        {{ $clients->links() }}
    </div>
@endsection
@push('modals')
    @include('partials.__confirm_delete_modal')
@endpush
@push('scripts')
    <script src="{{ asset(mix('js/delete-modal.js')) }}"></script>
@endpush