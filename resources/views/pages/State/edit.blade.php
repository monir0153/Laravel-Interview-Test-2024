<x-dashboard-layout>
    <div class="dashboard__inner__item dashboard__card bg__white padding-20 radius-10">
        <h4 class="dashboard__inner__item__header__title">Edit State</h4>
        <input type="hidden" id="data-id" value="{{ $data->id }}" />
        <form class="mt-5" id="edit-state-form">
            @csrf
            <div class="form__input__flex">
                <div class="form__input__single">
                    <label for="name5" class="form__input__single__label">Country Name</label>
                    <select class="js-example-basic-single" name="country_id" id="name5">

                    </select>
                </div>
                <div class="form__input__single">
                    <label for="name5" class="form__input__single__label">State Name</label>
                    <input type="text" name="name" id="name" class="form__control radius-5"
                        placeholder="State Name">
                </div>
                <div class="form__input__single">
                    <label for="name6" class="form__input__single__label">State Description</label>
                    <input type="text" name="description" id="description" class="form__control radius-5"
                        placeholder="State Description">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-4">submit</button>

        </form>
    </div>
    @push('scripts')
        <script>
            $(function() {
                $('.js-example-basic-single').select2({
                    placeholder: 'Select a state',
                });
                fetchCountryData();
            })
            async function fetchCountryData() {
                const data = await $.ajax({
                    url: "{{ route('country.index') }}",
                    method: 'GET',
                    success: function(response) {
                        let options = '<option value="">Select a state</option>';
                        response.data.forEach(country => {
                            options +=
                                `<option value="${country.id}" ${country.id == countryId ? 'selected' : ''} >${country.name}</option>`;
                        });
                        $('.js-example-basic-single').html(options);
                    },
                    error: function(error) {
                        console.error(error);
                    }
                })
            }
            let countryId = null;
            async function EditState(id) {
                try {
                    const response = await $.ajax({
                        url: "{{ route('state.show', ':id') }}".replace(':id', id),
                        method: 'GET',
                    });
                    if (response.status === true) {
                        // console.log(response.data)
                        countryId = response.data.country_id;
                        $('#name').val(response.data.name);
                        $('#description').val(response.data.description);
                        response.message != null ? toastr.success(response.message) : '';
                    }
                } catch (xhr) {
                    // console.log(xhr)
                }
            }
            EditState($('#data-id').val());
            // // update state
            $('#edit-state-form').on('submit', async function(e) {
                e.preventDefault();
                await $.ajax({
                    url: "{{ route('state.update', ':id') }}".replace(':id', $('#data-id').val()),
                    method: 'PUT',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.status == true) {
                            toastr.success(response.message);
                            window.location.href = "{{ route('state.view') }}";
                        }
                    },
                    error: function(xhr) {
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
                });
            });
        </script>
    @endpush
</x-dashboard-layout>
