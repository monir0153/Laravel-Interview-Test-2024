<x-dashboard-layout>
    <div class="dashboard__inner__item dashboard__card bg__white padding-20 radius-10">
        <h4 class="dashboard__inner__item__header__title">Edit Country</h4>
        {{-- <input type="hidden" id="data-id" value="{{ $data->id }}" /> --}}
        <form class="mt-5" id="edit-country-form">
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
            // async function EditCountry(id) {
            //     try {
            //         const response = await $.ajax({
            //             url: "{{ route('country.show', ':id') }}".replace(':id', id),
            //             method: 'GET',
            //         });
            //         if (response.status === true) {
            //             $('#name').val(response.data.name);
            //             $('#description').val(response.data.description);
            //             response.message != null ? toastr.success(response.message) : '';
            //         }
            //     } catch (xhr) {

            //     }
            // }
            // EditCountry($('#data-id').val());
            // // update country
            // $('#edit-country-form').on('submit', async function(e) {
            //     e.preventDefault();
            //     await $.ajax({
            //         url: "{{ route('country.update', ':id') }}".replace(':id', $('#data-id').val()),
            //         method: 'PUT',
            //         data: $(this).serialize(),
            //         success: function(response) {
            //             if (response.status == true) {
            //                 toastr.success(response.message);
            //                 window.location.href = "{{ route('country.view') }}";
            //             }
            //         },
            //         error: function(xhr) {
            //             if (xhr.responseJSON && xhr.responseJSON.errors) {
            //                 $.each(xhr.responseJSON.errors, function(key, messages) {
            //                     messages.forEach(function(message) {
            //                         toastr.error(message);
            //                     });
            //                 });
            //             } else {
            //                 toastr.error(xhr.responseJSON.message);
            //             }
            //         }
            //     });
            // });
        </script>
    @endpush
</x-dashboard-layout>
