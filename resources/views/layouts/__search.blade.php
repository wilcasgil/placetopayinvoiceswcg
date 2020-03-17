<nav class="navbar navbar-light float-right">
    <form action="{{ route('invoices.index') }}" method="get" class="form-inline">

        <!-- <select name="searchType" class="form-control mr-ms-2">
            <option>Search by</option>
            <option>Client id</option>
            <option>Invoice state id</option>
            <option>Payment type id</option>
        </select> -->

        <input type="search" name="search" id="search" value="{{ Request::get('search') }}" placeholder="{{ __('Client id') }}" class="form-control mr-ms-2" aria-label="Search">

        <div class="input-group-append">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                Search
            </button>
        </div>
    </form>
</nav>