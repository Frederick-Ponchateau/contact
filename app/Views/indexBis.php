<div >
        <table >
          <thead>
            <tr>
            
              <th>
                <label>
                  <input type="checkbox" onClick="toggle(this)" />
                  <span></span>
                </label>
              </th>
              
              <th>Full Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Favorite</th>
              <th>Delete</th>
              <th>Modifier</th>
            </tr>
          </thead>
          <tbody  id= "listContact">
            <?php     if(isset($contacts)){
                            foreach($contacts as $contact){?>        
              <tr class="listTr" id="contact-<?=$contact->id?>">                                                                  
              <td class="center-align contact-checkbox">
                <label class="checkbox-label">
                  <input type="checkbox" name="foo" />
                  <span></span>
                </label>
              </td>              
              <td><?= $contact->first_Name." ".$contact->last_Name ?></td>
              <td><?= $contact->email ?></td>
              <td><?= $contact->phone ?></td>
            
              <!-- definition data js -->
              <td><span class="favorite"><i data-role="favory" data-ref="<?=$contact->id?>" data-nom="<?=$contact->first_Name?>" class="material-icons"> star_border </i></span></td>
              <td><span  class="delete" ><i data-role="delete" data-ref="<?=$contact->id?>" class="material-icons delete">delete_outline</i></span></td>
              <td> <span> <i></i></span> </td>               
            </tr>
              <?php }}?>
            </tbody>
          </table>
          <button class="btnPrev btn btn-primary">Prev</button>
          <button class="btnNext btn btn-primary">next</button>
      </div>