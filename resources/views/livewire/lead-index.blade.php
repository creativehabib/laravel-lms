<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Email</th>
            <th class="border px-4 py-2 text-left">Phone</th>
            <th class="border px-4 py-2">Registered</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
        @foreach($leads as $lead)
            <tr>
                <td class="border px-4 py-2">{{$lead->name}}</td>
                <td class="border px-4 py-2">{{$lead->email}}</td>
                <td class="border px-4 py-2">{{$lead->phone}}</td>
                <td class="border px-4 py-2 text-center">{{date('F j, Y', strtotime($lead->created_at))}}</td>
                <td class="border px-4 py-2 text-center">
                    <div class="flex items-center justify-center">
                        <a class="text-blue-400" href="{{ route('lead.edit',$lead->id) }}">
                            @include('components.icons.edit')
                        </a>

                        <a class="px-3 text-green-600" href="{{ route('lead.show',$lead->id) }}">
                            @include('components.icons.eye')
                        </a>

                        <form class="text-red-600" onclick="return confirm('Are you sure you want to rollback deletion of candidate table?');" wire:submit.prevent="leadDelete({{$lead->id}})">
                            <button type="submit">
                                @include('components.icons.delete')
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="mt-4">
        {{$leads->links()}}
    </div>
</div>
