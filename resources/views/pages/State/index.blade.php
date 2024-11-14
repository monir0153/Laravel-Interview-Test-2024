<x-dashboard-layout>
    <div>
        <div class="dashboard__inner__item dashboard__card bg__white padding-20 radius-10">
            <div class="d-flex justify-content-between">
                <h4 class="dashboard__inner__item__header__title">All States</h4>
                <a href="{{ route('state.add') }}" class="btn btn-info">Add State</a>
            </div>
            <!-- Table Design One -->
            <div class="tableStyle_one mt-4">
                <div class="table_wrapper">
                    <!-- Table -->
                    <table>
                        <thead>
                            <tr>
                                <th width="5%">sl</th>
                                <th width="15%">Country Name</th>
                                <th width="15%">State Name</th>
                                <th width="50%">State description</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                </div>
            </div>
            <!-- End-of Table one -->
        </div>

    </div>
    @push('scripts')
        <script>
            async function fetchStateData() {
                try {
                    const response = await $.ajax({
                        url: "{{ route('state.index') }}",
                        method: 'GET',
                    });
                    if (response.status === true) {
                        response.message != null ? toastr.success(response.message) : '';
                        console.log(response)
                        let tableBody = '';
                        $('tbody').empty();
                        response.data.map(function(item, index) {
                            tableBody += ` <tr>
                                    <td>${index+1}</td>
                                    <td>${item.country_name}</td>
                                    <td>${item.name}</td>
                                    <td>${item.description}</td>
                                    <td>
                                        <div class="dropdown custom__dropdown">
                                            <button class="dropdown-toggle" type="button" id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="las la-ellipsis-h"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end"
                                                aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" href="edit/${item.id}">Edit</a></li>
                                                <li><a class="dropdown-item" onClick="deleteState(${item.id})">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>`;
                        });
                        $('tbody').append(tableBody);
                    }
                } catch (xhr) {
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        $.each(xhr.responseJSON.errors, function(key, messages) {
                            messages.forEach(function(message) {
                                toastr.error(message);
                            });
                        });
                    } else {
                        toastr.error(xhr.responseJSON.message);
                    }
                }
            }
            fetchStateData();

            async function deleteState(id) {
                try {
                    const response = await $.ajax({
                        url: "{{ route('state.destroy', ':id') }}".replace(':id', id),
                        method: 'DELETE',
                    });
                    if (response.status === true) {
                        response.message != null ? toastr.success(response.message) : '';
                        fetchStateData();
                    }
                } catch (xhr) {
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        $.each(xhr.responseJSON.errors, function(key, messages) {
                            messages.forEach(function(message) {
                                toastr.error(message);
                            });
                        });
                    } else {
                        toastr.error(xhr.responseJSON.message);
                    }
                }
            }
        </script>
    @endpush
</x-dashboard-layout>
