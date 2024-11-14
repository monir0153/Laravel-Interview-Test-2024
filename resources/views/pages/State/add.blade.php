<x-dashboard-layout>
    <div class="dashboard__inner__item dashboard__card bg__white padding-20 radius-10">
        <h4 class="dashboard__inner__item__header__title">Create State</h4>
        <form class="mt-5" id="create-state-form">
            @csrf
            <div class="form__input__flex">
                <div class="form__input__single">
                    <label for="name5" class="form__input__single__label">Country Name</label>
                    <select class="js-example-basic-single" name="country_id" id="name5">

                    </select>
                </div>
                <div class="form__input__single">
                    <label for="name6" class="form__input__single__label">State Name</label>
                    <input type="text" name="name" id="name6" class="form__control radius-5"
                        placeholder="state Name">
                </div>
                <div class="form__input__single">
                    <label for="name6" class="form__input__single__label">State Description</label>
                    <input type="text" name="description" id="description" class="form__control radius-5"
                        placeholder="state Description">
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
                try {
                    const data = await $.ajax({
                        url: "{{ route('country.index') }}",
                        method: 'GET',
                        success: function(response) {
                            let options = '<option value="">Select a state</option>';
                            response.data.forEach(country => {
                                options += `<option value="${country.id}">${country.name}</option>`;
                            });
                            $('.js-example-basic-single').html(options);
                        },
                        error: function(error) {
                            // console.error(error);
                        }
                    })
                } catch (error) {
                    // console.error(error);
                }

            }
            // create state
            $('#create-state-form').on('submit', async function(e) {
                e.preventDefault();
                await $.ajax({
                    url: "{{ route('state.store') }}",
                    method: 'POST',
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
