@foreach($web as $row)

<div class="preview-item border-bottom">
                            <div class="preview-thumbnail">
                              <div class="preview-icon bg-primary">
                                <i class="mdi mdi-file-document"></i>
                              </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <h6 class="preview-subject">{{$row['name']}}</h6>
                                <p class="text-muted mb-0">{{$row['url']}}</p>
                              </div>
                              <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                <p class="text-muted">{{date('d/m/y', strtotime($row['created_at'])) }}</p>
                                <p class="text-muted mb-0">{{$row['status']}}</p>
                              </div>
                            </div>
                          </div>

                          @endforeach