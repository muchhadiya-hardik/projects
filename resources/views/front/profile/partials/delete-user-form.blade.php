<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <div class="container mt-3">
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal">
            Delete Account
        </button>
      </div>

      <div class="modal" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Delete Account</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{ route('profile.destroy') }}" class="p-6" id="form">
                    @csrf
                    @method('delete')

                    <h2 class="text-lg font-medium text-gray-900">Are you sure your want to delete your account?</h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                    </p>

                    <div class="mt-6">
                        <label class="block font-medium text-sm text-gray-700" for="password" value="Password" class="sr-only" >Password</label>

                        <input
                            id="password"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            name="password"
                            type="password"
                            class="mt-1 block w-3/4 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            placeholder="Password"
                        />
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" onclick="$('#form').submit();">Delete Account</button>
            </div>

          </div>
        </div>
      </div>
</section>
