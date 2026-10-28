<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<link rel="icon" href="/favicon.ico?v=2" sizes="any">
<link rel="icon" type="image/png" href="/favicon.png?v=2">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Invite Page | Admin | Sveringhoy</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#f7f3ed] font-sans text-[#35261c] antialiased">
    <div class="min-h-screen lg:grid lg:grid-cols-[248px_1fr]">
        <aside class="flex flex-col justify-between bg-[#4b3426] px-5 py-6 text-white lg:min-h-screen lg:px-6">
            <div>
                <a href="{{ route('home') }}" class="flex items-center gap-3 px-2 text-sm font-semibold tracking-wide">
                    <span class="grid size-10 place-items-center rounded-xl bg-white/10 text-lg">S</span>
                    <span>Sveringhoy <span class="mt-0.5 block text-[10px] font-medium text-white/50">ADMINISTRATION</span></span>
                </a>
                <nav aria-label="Admin navigation" class="mt-10 grid gap-1">
                    <a href="{{ route('admin.invite') }}" aria-current="page" class="flex items-center gap-3 rounded-xl bg-white/10 px-3 py-2.5 text-sm font-medium text-white"><span class="grid size-7 place-items-center rounded-lg bg-white/10">✉</span>Invite Page</a>
                </nav>
            </div>
            <form method="POST" action="{{ route('admin.logout') }}" class="mt-8 border-t border-white/10 pt-5">
                @csrf
                <div class="mb-4 px-2">
                    <p class="truncate text-sm font-medium">{{ auth()->user()->name }}</p>
                    <p class="mt-1 truncate text-xs text-white/45">{{ auth()->user()->email }}</p>
                </div>
                <button type="submit" class="flex w-full items-center gap-3 rounded-xl px-3 py-2.5 text-left text-sm text-white/65 transition hover:bg-white/5 hover:text-white"><span class="grid size-7 place-items-center rounded-lg bg-white/5">↗</span>Sign out</button>
            </form>
        </aside>

        <main class="min-w-0 px-5 py-7 sm:px-8 lg:px-12 lg:py-10">
            <header class="flex flex-wrap items-center justify-between gap-4 border-b border-[#e6ddd3] pb-6">
                <div>
                    <p class="text-xs font-medium text-[#918276]">Admin workspace</p>
                    <h1 class="mt-1 font-display text-3xl font-medium tracking-[-0.05em]">Invite Page</h1>
                </div>
            </header>

            <section class="pt-7 pb-10">
                <div class="mb-4 flex flex-wrap items-center justify-between gap-4">
                    <div>
                        <div class="flex flex-wrap items-center gap-3">
                            <h2 class="font-display text-2xl font-medium tracking-[-0.045em]">Guests</h2>
                            <span class="inline-flex items-center gap-2 rounded-full border border-[#e5d9cb] bg-white px-3 py-1.5 text-xs font-medium text-[#76583f]">
                                <strong class="text-sm text-[#4b3426]">{{ $confirmedAttendeeCount }}</strong> confirmed attendees
                            </span>
                            <span class="inline-flex items-center gap-2 rounded-full border border-[#e5d9cb] bg-white px-3 py-1.5 text-xs font-medium text-[#76583f]">
                                <strong class="text-sm text-[#4b3426]">{{ $totalGuestCount }}</strong> total guests and sub-guests
                            </span>
                        </div>
                    </div>
                    <button type="button" data-open-guest-modal class="inline-flex min-h-11 items-center gap-2 rounded-full bg-[#4b3426] px-5 text-sm font-semibold text-white transition hover:bg-[#634834]">
                        <span aria-hidden="true" class="text-lg leading-none">+</span> Add Guest
                    </button>
                </div>

                @if (session('status'))
                    <p role="status" class="mb-4 rounded-xl border border-[#d8e7d6] bg-[#f2f8f0] px-4 py-3 text-sm text-[#476344]">{{ session('status') }}</p>
                @endif

                <div class="overflow-hidden rounded-2xl border border-[#e8ded2] bg-white shadow-[0_8px_28px_rgba(78,54,35,0.04)]">
                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[600px] text-left text-sm">
                            <thead class="bg-[#faf7f2] text-xs uppercase tracking-[0.12em] text-[#8f8072]">
                                <tr>
                                    <th scope="col" class="px-5 py-4 font-semibold">Name</th>
                                    <th scope="col" class="px-5 py-4 font-semibold">Code</th>
                                    <th scope="col" class="px-5 py-4 font-semibold">Confirmed</th>
                                    <th scope="col" class="px-5 py-4 text-right font-semibold">Number of Sub Guests</th>
                                    <th scope="col" class="px-5 py-4 text-right font-semibold">Sub guests</th>
                                    <th scope="col" class="px-5 py-4 text-right font-semibold">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#f0e9df]">
                                @forelse ($guests as $guest)
                                    <tr class="text-[#514235]">
                                        <td class="px-5 py-4 font-medium">{{ $guest->name }}</td>
                                        <td class="px-5 py-4 font-mono font-semibold tracking-[0.14em] text-[#76583f]">{{ $guest->code }}</td>
                                        <td class="px-5 py-4">
                                            <span class="rounded-full px-2.5 py-1 text-xs font-semibold {{ $guest->confirmed === 1 ? 'bg-[#eef5eb] text-[#476344]' : ($guest->confirmed === 2 ? 'bg-[#fcf3f1] text-[#9b4939]' : 'bg-[#f5f1ec] text-[#837467]') }}">{{ $guest->confirmed === 1 ? 'Confirmed' : ($guest->confirmed === 2 ? 'Not attending' : 'Pending') }}</span>
                                        </td>
                                        <td class="px-5 py-4 text-right">{{ $guest->sub_guests }}</td>
                                        <td class="px-5 py-4 text-right">
                                            @if ($guest->sub_guests > 0)
                                                <button type="button" data-subguest-toggle="sub-guests-{{ $guest->id }}" data-subguest-count="{{ $guest->sub_guests }}" aria-expanded="false" class="rounded-full border border-[#e5d9cb] px-3 py-1.5 text-xs font-semibold text-[#76583f] transition hover:border-[#b99b7d] hover:bg-[#faf7f2]">
                                                    Show ({{ $guest->sub_guests }})
                                                </button>
                                            @else
                                                <span class="text-[#b4a699]">—</span>
                                            @endif
                                        </td>
                                        <td class="px-5 py-4">
                                            <div class="flex justify-end gap-2">
                                                <button type="button" data-edit-guest data-guest-id="{{ $guest->id }}" data-guest-name="{{ $guest->name }}" data-guest-sub-guests="{{ $guest->sub_guests }}" data-update-url="{{ route('admin.guests.update', $guest) }}" class="rounded-full border border-[#e5d9cb] px-3 py-1.5 text-xs font-semibold text-[#76583f] transition hover:border-[#b99b7d] hover:bg-[#faf7f2]">Edit</button>
                                                <button type="button" data-copy-invite data-guest-name="{{ $guest->name }}" data-guest-code="{{ $guest->code }}" class="rounded-full border border-[#e5d9cb] px-3 py-1.5 text-xs font-semibold text-[#76583f] transition hover:border-[#b99b7d] hover:bg-[#faf7f2]">Copy</button>
                                                <form method="POST" action="{{ route('admin.guests.destroy', $guest) }}" data-delete-guest-form data-confirm="Delete {{ $guest->name }}? This will also delete their sub-guest responses.">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="rounded-full border border-[#ead4ce] px-3 py-1.5 text-xs font-semibold text-[#9b4939] transition hover:bg-[#fcf3f1]">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @if ($guest->sub_guests > 0)
                                        <tr id="sub-guests-{{ $guest->id }}" hidden class="bg-[#fcfaf7]">
                                            <td colspan="6" class="px-5 py-4">
                                                <div class="rounded-xl border border-[#eee5da] bg-white p-4">
                                                    <h3 class="text-xs font-semibold uppercase tracking-[0.12em] text-[#8f8072]">Sub guests for {{ $guest->name }}</h3>
                                                    @if ($guest->subGuestResponses->isNotEmpty())
                                                        <ul class="mt-3 divide-y divide-[#f0e9df]">
                                                            @foreach ($guest->subGuestResponses as $subGuest)
                                                                <li class="flex items-center justify-between gap-4 py-2.5 text-sm">
                                                                    <span class="font-medium text-[#514235]">{{ $subGuest->name ?: 'Name not provided' }}</span>
                                                                    <span class="rounded-full px-2.5 py-1 text-xs font-semibold {{ $subGuest->attending ? 'bg-[#eef5eb] text-[#476344]' : 'bg-[#f5f1ec] text-[#837467]' }}">{{ $subGuest->attending ? 'Attending' : 'Not attending' }}</span>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @else
                                                        <p class="mt-3 text-sm text-[#918276]">No sub-guest responses yet.</p>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-5 py-12 text-center text-sm text-[#918276]">No guests have been added yet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <div data-guest-modal class="fixed inset-0 z-50 hidden items-center justify-center bg-[#24180f]/50 p-4" role="dialog" aria-modal="true" aria-labelledby="guest-modal-title">
        <div class="w-full max-w-md rounded-2xl border border-[#e8ded2] bg-white p-6 shadow-2xl">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <h2 id="guest-modal-title" class="mt-2 font-display text-2xl font-medium tracking-[-0.045em]">Add a guest</h2>
                    <p class="mt-1 text-sm text-[#8f8072]">Enter the guest’s name and accompanying guests.</p>
                </div>
                <button type="button" data-close-guest-modal aria-label="Close dialog" class="grid size-9 shrink-0 place-items-center rounded-full text-xl text-[#837467] transition hover:bg-[#f7f3ed]">×</button>
            </div>

            <form data-guest-form method="POST" action="{{ route('admin.guests.store') }}" data-store-url="{{ route('admin.guests.store') }}" class="mt-6 grid gap-5">
                @csrf
                <input type="hidden" name="_method" value="POST" disabled data-method-input>
                <input type="hidden" name="guest_id" value="{{ old('guest_id') }}" data-guest-id-input>
                <label class="grid gap-2 text-sm font-medium text-[#594536]">
                    Name
                    <input name="name" value="{{ old('name') }}" required maxlength="255" autocomplete="name" class="min-h-11 rounded-xl border border-[#e5d9cb] px-3 text-[#35261c] outline-none transition placeholder:text-[#b4a699] focus:border-[#9a7655] focus:ring-2 focus:ring-[#9a7655]/15" placeholder="Guest name">
                    @error('name') <span class="text-xs font-normal text-red-700">{{ $message }}</span> @enderror
                </label>
                <label class="grid gap-2 text-sm font-medium text-[#594536]">
                    Number of Sub Guests
                    <input name="sub_guests" type="number" value="{{ old('sub_guests', 0) }}" required min="0" max="99" class="min-h-11 rounded-xl border border-[#e5d9cb] px-3 text-[#35261c] outline-none transition focus:border-[#9a7655] focus:ring-2 focus:ring-[#9a7655]/15">
                    @error('sub_guests') <span class="text-xs font-normal text-red-700">{{ $message }}</span> @enderror
                </label>
                <div class="flex justify-end gap-3 border-t border-[#f0e9df] pt-5">
                    <button type="button" data-close-guest-modal class="min-h-10 rounded-full border border-[#e5d9cb] px-4 text-sm font-semibold text-[#594536] transition hover:bg-[#faf7f2]">Cancel</button>
                    <button data-save-guest-button type="submit" class="inline-flex min-h-10 items-center justify-center gap-2 rounded-full bg-[#4b3426] px-5 text-sm font-semibold text-white transition hover:bg-[#634834] disabled:cursor-wait disabled:opacity-70">
                        <svg data-saving-icon class="hidden size-4 animate-spin" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 0 1 8-8v4a4 4 0 0 0-4 4H4z"></path></svg>
                        <span data-save-guest-label>Save Guest</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const guestModal = document.querySelector('[data-guest-modal]');
        const guestForm = document.querySelector('[data-guest-form]');
        const guestModalTitle = document.querySelector('#guest-modal-title');
        const methodInput = guestForm.querySelector('[data-method-input]');
        const guestIdInput = guestForm.querySelector('[data-guest-id-input]');
        const guestNameInput = guestForm.querySelector('input[name="name"]');
        const subGuestsInput = guestForm.querySelector('input[name="sub_guests"]');
        const openGuestModal = () => {
            guestModal.classList.remove('hidden');
            guestModal.classList.add('flex');
            guestModal.querySelector('input[name="name"]').focus();
        };
        const setGuestFormMode = (mode, guest = null) => {
            const editing = mode === 'edit';
            guestForm.action = editing ? guest.dataset.updateUrl : guestForm.dataset.storeUrl;
            methodInput.disabled = !editing;
            methodInput.value = 'PUT';
            guestIdInput.value = editing ? guest.dataset.guestId : '';
            guestNameInput.value = editing ? guest.dataset.guestName : '';
            subGuestsInput.value = editing ? guest.dataset.guestSubGuests : '0';
            guestModalTitle.textContent = editing ? 'Edit guest' : 'Add a guest';
            guestForm.querySelector('[data-save-guest-label]').textContent = editing ? 'Save Changes' : 'Save Guest';
            guestForm.querySelector('[data-save-guest-button]').disabled = false;
            guestForm.querySelector('[data-saving-icon]').classList.add('hidden');
        };
        const closeGuestModal = () => {
            guestModal.classList.add('hidden');
            guestModal.classList.remove('flex');
        };

        document.querySelectorAll('[data-close-guest-modal]').forEach((button) => button.addEventListener('click', closeGuestModal));
        document.querySelectorAll('[data-edit-guest]').forEach((button) => button.addEventListener('click', () => {
            setGuestFormMode('edit', button);
            openGuestModal();
        }));
        document.querySelector('[data-open-guest-modal]').addEventListener('click', () => {
            setGuestFormMode('create');
            openGuestModal();
        });
        document.querySelectorAll('[data-delete-guest-form]').forEach((form) => form.addEventListener('submit', (event) => {
            if (!confirm(form.dataset.confirm)) event.preventDefault();
        }));
        document.querySelectorAll('[data-copy-invite]').forEach((button) => button.addEventListener('click', async () => {
            const invite = `https://sven-zayden.site/\nName: ${button.dataset.guestName}\nCode: ${button.dataset.guestCode}`;

            try {
                await navigator.clipboard.writeText(invite);
                button.textContent = 'Copied';
                window.setTimeout(() => {
                    button.textContent = 'Copy';
                }, 1500);
            } catch {
                alert('Unable to copy the invite. Please check clipboard permissions and try again.');
            }
        }));
        document.querySelector('[data-guest-form]').addEventListener('submit', () => {
            const button = document.querySelector('[data-save-guest-button]');
            if (button.disabled) return;

            button.disabled = true;
            button.querySelector('[data-saving-icon]').classList.remove('hidden');
            button.querySelector('[data-save-guest-label]').textContent = 'Saving ...';
        });
        document.querySelectorAll('[data-subguest-toggle]').forEach((button) => {
            const detailRow = document.getElementById(button.dataset.subguestToggle);
            button.addEventListener('click', () => {
                const expanded = button.getAttribute('aria-expanded') === 'true';
                button.setAttribute('aria-expanded', String(!expanded));
                detailRow.hidden = expanded;
                button.textContent = expanded ? `Show (${button.dataset.subguestCount})` : 'Hide';
            });
        });
        guestModal.addEventListener('click', (event) => {
            if (event.target === guestModal) closeGuestModal();
        });
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') closeGuestModal();
        });

        @if ($errors->any())
            @if (old('guest_id'))
                const failedGuestEdit = document.querySelector(`[data-edit-guest][data-guest-id="${CSS.escape(@js(old('guest_id')))}"]`);
                if (failedGuestEdit) {
                    setGuestFormMode('edit', failedGuestEdit);
                    guestNameInput.value = @js(old('name'));
                    subGuestsInput.value = @js(old('sub_guests'));
                }
            @else
                setGuestFormMode('create');
            @endif
            openGuestModal();
        @endif
    </script>
</body>
</html>
