<x-forms.form method='POST' action="{{ route('talks.store') }}">
    <x-forms.input label='Title' name='title' placeholder='How to save a file' />
    <div class="flex gap-4">
        <div class="w-1/2">
            <x-forms.select label="Type" name="type">
                <option>Standard</option>
                <option>Lightening</option>
                <option>Keynote</option>
            </x-forms.select>
        </div>
    
        <div class="w-1/2">
            <x-forms.input label="Length" name="length" />
        </div>
    </div>
    
    <x-forms.text_area label='Abstract' name='abstract' discription='Describe the talk in a few sentences, in a way that`s compelling and informative and could be presented to the public.'/>
    <x-forms.text_area label='Organizer Notes' name='organizer_notes' discription='Write any notes you may want to pass to an event organizer about this talk.' />
    <x-forms.button>Save</x-forms.button>
</x-forms.form>
