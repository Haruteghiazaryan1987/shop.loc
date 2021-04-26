@if ($products)
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Projects</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped projects">
          <thead>
            <tr>
              <th style="width: 1%">
                #
              </th>
              <th style="width: 20%">
                Project Name
              </th>
              <th style="width: 30%">
                Team Members
              </th>
              <th>
                Project Progress
              </th>
              <th style="width: 8%" class="text-center">
                Status
              </th>
              <th style="width: 20%">
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $product)
              <tr>
                <td>
                  {{ $product->id }}
                </td>
                <td>
                  <a>
                    {{ $product->name }}
                  </a>
                  <br>
                  <small>
                    {{ $product->created_at }}
                  </small>
                </td>
                
                <td>
                  <ul class="list-inline">
                    <li class="list-inline-item">
                      <img alt="Avatar" class="table-avatar" src="/dashboard/dist/img/avatar.png ">
                    </li>
                  </ul>
                </td>
                <td class="project_progress">
                  <div class="progress progress-sm">
                    <div class="progress-bar bg-green" role="progressbar" aria-volumenow="57" aria-volumemin="0"
                      aria-volumemax="100" style="width: 57%">
                    </div>
                  </div>
                  <small>
                    57% Complete
                  </small>
                </td>
                <td class="project-state">
                  <span class="badge badge-success">Success</span>
                </td>
                <td class="project-actions text-right">
                  <a class="btn btn-primary btn-sm" href="#">
                    <i class="fas fa-folder">
                    </i>
                    View
                  </a>
                  <a class="btn btn-info btn-sm" href="#">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Edit
                  </a>
                  <a class="btn btn-danger btn-sm delete-btn" href="#">
                    <i class="fas fa-trash">
                    </i>
                    Delete
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.card -->
  </section>
@endif
