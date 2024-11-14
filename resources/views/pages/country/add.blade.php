<x-dashboard-layout>
    <div class="dashboard__inner__item dashboard__card bg__white padding-20 radius-10">
        <h4 class="dashboard__inner__item__header__title">Create Country</h4>
        <form class="mt-5" id="create-country-form">
            @csrf
            <div class="form__input__flex">
                <div class="form__input__single">
                    <label for="name5" class="form__input__single__label">Country Name</label>
                    <input type="text" name="name" id="name" class="form__control radius-5"
                        placeholder="Country Name">
                </div>
                <div class="form__input__single">
                    <label for="name6" class="form__input__single__label">Country Description</label>
                    <input type="text" name="description" id="description" class="form__control radius-5"
                        placeholder="Country Description">
                </div>

                <button type="submit" class="btn btn-primary">submit</button>

        </form>
    </div>
    @push('scripts')
        <script>
            // create country
            $('#create-country-form').on('submit', async function(e) {
                e.preventDefault();
                await $.ajax({
                    url: "{{ route('country.store') }}",
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.status == true) {
                            toastr.success(response.message);
                            window.location.href = "{{ route('country.view') }}";
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
