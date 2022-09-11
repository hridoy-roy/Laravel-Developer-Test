<div>
    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
        <thead>
            <tr>
                <th>Title</th>
                <th>Ans</th>
                <th>Options</th>
                <th>Status</th>
                <th>Log</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($questions as $question)
            <tr>
                <td>{{ $question->title }}</td>
                <td>@foreach ( $question->option as $option)
                    @if ($option->is_ans)
                    {{ $option->option }}
                    @endif <br>
                    @endforeach</td>
                <td>@foreach ( $question->option as $option)
                    {{ $option->option }} <br>
                    @endforeach</td>
                <td>{{ $question->is_active ? "Active": "Deactive"}}</td>
                <td>{{ $question->created_at }}</td>
                <td>
                    <a href="{{ route('question.edit',$question->id) }}"
                        class="btn btn-primary waves-effect waves-light">
                        <i class="bx bx-edit font-size-20 align-middle"></i>
                    </a>
                    <button wire:click='deleteQuestion({{ $question->id }})'
                        class="btn btn-primary waves-effect waves-light">
                        <i class="bx bx-edit font-size-20 align-middle"></i>
                    </button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No Data</td>
            </tr>
            @endforelse

        </tbody>
    </table>


</div>