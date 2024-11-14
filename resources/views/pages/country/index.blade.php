<x-dashboard-layout>
    <div>
        <div class="dashboard__inner__item dashboard__card bg__white padding-20 radius-10">
            <div class="d-flex justify-content-between">
                <h4 class="dashboard__inner__item__header__title">All Country</h4>
                <a href="{{ route('country.add') }}" class="btn btn-info">Add Country</a>
            </div>
            <!-- Table Design One -->
            <div class="tableStyle_one mt-4">
                <div class="table_wrapper">
                    <!-- Table -->
                    <table>
                        <thead>
                            <tr>
                                <th width="5%">sl</th>
                                <th width="20%">Country Name</th>
                                <th width="60%">Country description</th>
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
            async function fetchCountryData() {
                try {
                    const response = await $.ajax({
                        url: "{{ route('country.index') }}",
                        method: 'GET',
                    });
                    if (response.status === true) {
                        response.message != null ? toastr.success(response.message) : '';
                        // console.log(response.data)
                        let tableBody = '';
                        $('tbody').empty();
                        response.data.map(function(item, index) {
                            tableBody += ` <tr>
                        <td>${index+1}</td>
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
                                    <li><a class="dropdown-item" onClick="deleteCountry(${item.id})">Delete</a></li>
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

            $(function() {
                fetchCountryData();
            });

            async function deleteCountry(id) {
                try {
                    const response = await $.ajax({
                        url: "{{ route('country.destroy', ':id') }}".replace(':id', id),
                        method: 'DELETE',
                    });
                    if (response.status === true) {
                        response.message != null ? toastr.success(response.message) : '';
                        fetchCountryData();
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
