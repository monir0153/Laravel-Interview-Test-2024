<x-dashboard-layout>
    <div>
        <div class="dashboard__inner__item dashboard__card bg__white padding-20 radius-10">
            <div class="d-flex justify-content-between">
                <h4 class="dashboard__inner__item__header__title">All Cities</h4>
                <a href="{{ route('city.add') }}" class="btn btn-info">Add City</a>
            </div>
            <!-- Table Design One -->
            <div class="tableStyle_one mt-4">
                <div class="table_wrapper">
                    <!-- Table -->
                    <table>
                        <thead>
                            <tr>
                                <th width="5%">sl</th>
                                <th width="15%">State Name</th>
                                <th width="15%">City Name</th>
                                <th width="50%">City description</th>
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
            async function fetchCityData() {
                try {
                    const response = await $.ajax({
                        url: "{{ route('city.index') }}",
                        method: 'GET',
                    });
                    if (response.status === true) {
                        response.message != null ? toastr.success(response.message) : '';
                        let tableBody = '';
                        $('tbody').empty();
                        response.data.map(function(item, index) {
                            tableBody += ` <tr>
                            <td>${index+1}</td>
                            <td>${item.state_name}</td>
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
                                        <li><a class="dropdown-item" onClick="deleteCity(${item.id})">Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>`;
                        });
                        $('tbody').append(tableBody);
                    }
                } catch (xhr) {
                    if (xhr.responseJSON) {
                        toastr.error(xhr.responseJSON.message);
                    }
                }
            }
            fetchCityData();

            async function deleteCity(id) {
                try {
                    const response = await $.ajax({
                        url: "{{ route('city.destroy', ':id') }}".replace(':id', id),
                        method: 'DELETE',
                    });
                    if (response.status === true) {
                        response.message != null ? toastr.success(response.message) : '';
                        fetchCityData();
                    }
                } catch (xhr) {
                    console.log(xhr)
                }
            }
        </script>
    @endpush
</x-dashboard-layout>
