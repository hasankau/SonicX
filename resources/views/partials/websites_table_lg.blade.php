
<div class="table-responsive">
                      <table class="table table-dark">
                        <thead>
                          <tr>
                            <th> URL </th>
                            <th> Moniter name </th>
                            <th> Check frequency </th>
                            <th> Date added </th>
                            <th> Tags </th>
                            <th> Action </th>
                            <th>  </th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($web as $row)
                          <tr>
                            <td> {{$row['url']}} </td>
                            <td> {{$row['name']}} </td>
                            <td> {{$row['check_frequency']}} </td>
                            <td> {{date('d/m/y', strtotime($row['created_at'])) }} </td>
                            <td> {{$row['status']}} </td>
                            <td> <button></button> </td>
                            <td>  </td>
                          </tr>

                          @endforeach
                          
                        </tbody>
                      </table>
                    </div>






                          