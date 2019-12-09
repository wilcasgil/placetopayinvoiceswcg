<tr>
    <td>{{ $clients->name }}</td>
    <td>{{ $clients->last_name }}</td>
    <td>{{ $clients->email }}</td>
    <td>{{ $clients->country->name }}</td>
    <td>{{ $clients->isEnabled() ? __('Enabled') : __('Disabled') }}</td>
    <td class="text-right">
        <div class="btn-group btn-group-sm" role="group" aria-label="{{ __('client actions') }}">
            <a href="{{ route('client.show', $clients) }}" class="btn btn-link" title="{{ __('View') }}">
                <i class="fas fa-eye"></i>
            </a>
            <a href="{{ route('client.edit', $clients) }}" class="btn btn-link" title="{{ __('Edit') }}">
                <i class="fas fa-edit"></i>
            </a>
            <button type="button" class="btn btn-link text-danger" data-route="{{ route('client.destroy', $clients) }}" data-toggle="modal" data-target="#confirmDeleteModal" title="{{ __('Delete') }}">
                <i class="fas fa-trash"></i>
            </button>
        </div>
    </td>
</tr>