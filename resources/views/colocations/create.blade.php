<x-guest-layout>
    <x-dashboard-header />

    <div class="min-h-screen bg-gray-50 py-12 px-4">
        <div class="max-w-xl mx-auto">
            
            <div class="flex items-center justify-between mb-8">
                <a href="{{route('colocations.index')}}" class="group flex items-center text-sm font-bold text-gray-500 hover:text-indigo-600 transition-colors">
                    <svg class="w-5 h-5 mr-2 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Retour
                </a>
                <span class="text-xs font-black text-indigo-300 uppercase tracking-widest">Étape 1 sur 1</span>
            </div>

            <div class="bg-white rounded-[3rem] shadow-2xl shadow-indigo-100/40 border border-white overflow-hidden">
                
                <div class="h-3 bg-gradient-to-r from-indigo-400 via-indigo-600 to-indigo-800"></div>

                <div class="p-8 lg:p-12">
                    <div class="mb-10">
                        <h2 class="text-3xl font-black text-gray-900 tracking-tight">Nouvel Espace</h2>
                        <p class="text-gray-500 mt-2">Configurez votre colocation pour commencer à suivre vos dépenses.</p>
                    </div>

                    <form action="{{route('colocations.store')}}" method="POST" class="space-y-8"  enctype="multipart/form-data">
                        @csrf
                        
                        <div class="space-y-3">
                            <label class="flex items-center text-sm font-bold text-gray-700 ml-1">
                                <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                                Nom de la colocation
                            </label>
                            <input type="text" name="name" placeholder="Le Loft des Amis" required
                                class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl text-gray-900 font-medium focus:ring-2 focus:ring-indigo-500 focus:bg-white transition-all duration-300">
                        </div>

                        <div class="space-y-3">
                            <label class="flex items-center text-sm font-bold text-gray-700 ml-1">
                                <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                Ville / Localisation
                            </label>
                            <input type="text" name="place" placeholder="Ex: Paris 11ème" required
                                class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl text-gray-900 font-medium focus:ring-2 focus:ring-indigo-500 focus:bg-white transition-all duration-300">
                        </div>

                        <div class="space-y-3">
                            <label class="flex items-center text-sm font-bold text-gray-700 ml-1">
                                <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" /></svg>
                                Inviter un colocataire (Optionnel)
                            </label>
                            <input type="email" id="invite-input" name="invite_email[]" placeholder="email@coloc.com" 
                                class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl text-gray-900 font-medium focus:ring-2 focus:ring-indigo-500 focus:bg-white transition-all duration-300">
                            <div id="invite-list" class="flex flex-wrap gap-2 mt-2"></div>
                            <p class="text-[11px] text-gray-400 ml-2 italic">Nous enverrons un lien d'accès magique à cette adresse.</p>
                        </div>

                        <div class="space-y-3">
                            <label class="flex items-center text-sm font-bold text-gray-700 ml-1">
                                <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Photo de la colocation (Optionnel)
                            </label>
                            
                            <div class="relative group">
                                <label class="flex flex-col items-center justify-center w-full h-32 px-6 transition bg-gray-50 border-2 border-gray-200 border-dashed rounded-2xl cursor-pointer hover:bg-indigo-50 hover:border-indigo-300 transition-all duration-300">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-2 text-indigo-400 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        <p class="text-xs text-gray-500"><span class="font-bold">Cliquez</span> ou glissez une image</p>
                                    </div>
                                    <!-- <input type="file" name="image" class="hidden"/> -->
                                    <input type="file" id="image-input" name="image" class="hidden" accept="image/*"/>
                                </label>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <label class="text-sm font-bold text-gray-700 ml-1 block">Statut de l'espace</label>
                            <div class="flex flex-col space-y-3">
                                <label class="relative flex items-center p-4 cursor-pointer rounded-2xl bg-gray-50 border-2 border-transparent has-[:checked]:border-indigo-600 has-[:checked]:bg-indigo-50/50 transition-all">
                                    <input type="radio" name="status" value="active" class="sr-only" checked>
                                    <div class="flex-1">
                                        <span class="block text-sm font-bold text-gray-900">Résidence Actuelle</span>
                                        <span class="block text-xs text-gray-500">Gérez vos dépenses en temps réel.</span>
                                    </div>
                                    <div class="w-6 h-6 rounded-full border-2 border-indigo-600 flex items-center justify-center bg-white">
                                        <div class="w-3 h-3 bg-indigo-600 rounded-full scale-0 transition-transform duration-200 peer-checked:scale-100"></div>
                                    </div>
                                </label>

                                <label class="relative flex items-center p-4 cursor-pointer rounded-2xl bg-gray-50 border-2 border-transparent has-[:checked]:border-indigo-600 has-[:checked]:bg-indigo-50/50 transition-all">
                                    <input type="radio" name="status" value="inactive" class="sr-only">
                                    <div class="flex-1">
                                        <span class="block text-sm font-bold text-gray-900">Archive / Passé</span>
                                        <span class="block text-xs text-gray-500">Importez vos anciens souvenirs.</span>
                                    </div>
                                    <div class="w-6 h-6 rounded-full border-2 border-gray-300 bg-white"></div>
                                </label>
                            </div>
                        </div>

                        <div class="pt-6">
                            <button type="submit" 
                                class="w-full py-5 bg-indigo-600 text-white font-black rounded-2xl shadow-xl shadow-indigo-200 hover:bg-indigo-700 hover:-translate-y-1 active:scale-95 transition-all duration-200 uppercase tracking-widest text-sm">
                                Créer l'Espace
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

<script>
    const input = document.getElementById('invite-input');
    const list = document.getElementById('invite-list');
    const form = input.closest('form'); // Get the parent form
    let emails = [];

    // Remove any existing hidden inputs when page loads
    document.querySelectorAll('input[name="invite_email[]"]').forEach(input => {
        if (input.type === 'hidden') {
            input.remove();
        }
    });

    input.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' && input.value.trim() !== '') {
            e.preventDefault(); // Prevent form submission
            const email = input.value.trim();
            if (validateEmail(email)) {
                emails.push(email);
                renderEmails();
                updateFormInputs();
                input.value = '';
            } else {
                alert('Veuillez entrer une adresse email valide');
            }
        }
    });

    function renderEmails() {
        list.innerHTML = '';
        emails.forEach((email, index) => {
            const chip = document.createElement('div');
            chip.className = 'flex items-center bg-indigo-50 text-indigo-700 px-3 py-1 rounded-full text-sm font-medium';
            chip.innerHTML = `
                ${email}
                <button type="button" onclick="removeEmail(${index})" class="ml-2 text-red-500 hover:text-red-700 font-bold">×</button>
            `;
            list.appendChild(chip);
        });
    }

    function updateFormInputs() {
        // Remove all existing hidden inputs with name "invite_email[]"
        document.querySelectorAll('input[name="invite_email[]"]').forEach(input => {
            if (input.type === 'hidden') {
                input.remove();
            }
        });
        
        // Create new hidden inputs for each email
        emails.forEach(email => {
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'invite_email[]';
            hiddenInput.value = email;
            form.appendChild(hiddenInput);
        });
    }

    window.removeEmail = function(index) {
        emails.splice(index, 1);
        renderEmails();
        updateFormInputs();
    }

    function validateEmail(email) {
        return /\S+@\S+\.\S+/.test(email);
    }

    // Also handle form submission to ensure emails are included
    if (form) {
        form.addEventListener('submit', function(e) {
            updateFormInputs(); // Double-check inputs are updated before submit
        });
    }
</script>
