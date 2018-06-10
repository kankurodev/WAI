<section class="bg-dark rounded p-3">
    <h1 class="text-center mb-5 text-light">{{ Auth::user() ->name}}'s Raffle</h1>
    <table class="table table-responsive table-bordered table-striped table-dark rounded table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Gender</th>
            <th scope="col">Age</th>
            <th scope="col">Status</th>
            <th scope="col" class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <th id="row_id" scope="col">{{ $ticketId }}</th>
                <td>{{ $ticketName }} </td>
                <td>{{ $ticketEmail }} </td>
                <td>{{ $ticketPhone }} </td>
                <td>{{ $ticketGender }} </td>
                <td>{{ $ticketAge }} </td>
                <td>{{ $ticketStatus }} </td>
                <td class="text-center" style="width: 1%; white-space: nowrap;">
                    <a href="{{ $ticketEdit }}" class="btn btn-sm btn-warning py-0 px-1" >Edit</a>
                    <a href="{{ $ticketDelete }}" class="btn btn-sm btn-danger py-0 px-1" >Delete</a>
                </td>
            </tr>
        </tbody>
    </table>
    {{-- $trades->links() --}}
</section>