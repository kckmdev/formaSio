# FORMA MISSION 2
[Voir le wiki](https://github.com/kckmdev/formaSio/wiki)

## reste a faire côté client 
- [ ] 5. revoir le jeu de tests
- [ ] 6. revoir les salariés et bénévoles

## reste a faire côté admin 
- [ ] 1. Créer une formation , modifier une formation supprimer une formation
- [ ] 2. Gérer les profils et accès des utilisateurs (bénévoles/salariés) pour les inscriptions en ligne
- [ ] 3. Valider manuellement les inscriptions faites en ligne (je suis pas sur mais changer le statut de l'inscription de en cours a validé ) 
- [ ] 4. Imprimer une liste des inscrits à une formation (une semaine avant la formation) (ici je pene on demande au format pdf)
- [ ] 5. Historiser les participations en fin d'année xml aussi
- [ ] 6. Gérer les intervenants (ajouter, modifier, supprimer) on le demande pas mais je pense que c'est bien de le faire

# Les routes

## Administrateur

- **Tableau de bord** : `GET /admin` (nommée `admin.dashboard`)
- **Formations** :
  - **Liste** : `GET /admin/formations` (nommée `admin.formations.index`)
  - **Création** : `GET /admin/formations/create` (nommée `admin.formations.create`)
  - **Enregistrement** : `POST /admin/formations` (nommée `admin.formations.store`)
  - **Détail** : `GET /admin/formations/{formation}` (nommée `admin.formations.show`)
  - **Édition** : `GET /admin/formations/{formation}/edit` (nommée `admin.formations.edit`)
  - **Mise à jour** : `PUT /admin/formations/{formation}` (nommée `admin.formations.update`)
  - **Suppression** : `DELETE /admin/formations/{formation}` (nommée `admin.formations.destroy`)
- **Intervenants** :
  - **Liste** : `GET /admin/intervenants` (nommée `admin.intervenants.index`)
  - **Création** : `GET /admin/intervenants/create` (nommée `admin.intervenants.create`)
  - **Enregistrement** : `POST /admin/intervenants` (nommée `admin.intervenants.store`)
  - **Détail** : `GET /admin/intervenants/{intervenant}` (nommée `admin.intervenants.show`)
  - **Édition** : `GET /admin/intervenants/{intervenant}/edit` (nommée `admin.intervenants.edit`)
  - **Mise à jour** : `PUT /admin/intervenants/{intervenant}` (nommée `admin.intervenants.update`)
  - **Suppression** : `DELETE /admin/intervenants/{intervenant}` (nommée `admin.intervenants.destroy`)
- **Domaines** :
  - **Liste** : `GET /admin/domaines` (nommée `admin.domaines.index`)
  - **Création** : `GET /admin/domaines/create` (nommée `admin.domaines.create`)
  - **Enregistrement** : `POST /admin/domaines` (nommée `admin.domaines.store`)
  - **Détail** : `GET /admin/domaines/{domaine}` (nommée `admin.domaines.show`)
  - **Édition** : `GET /admin/domaines/{domaine}/edit` (nommée `admin.domaines.edit`)
  - **Mise à jour** : `PUT /admin/domaines/{domaine}` (nommée `admin.domaines.update`)
  - **Suppression** : `DELETE /admin/domaines/{domaine}` (nommée `admin.domaines.destroy`)
- **Sessions** :
  - **Liste** : `GET /admin/sessions` (nommée `admin.sessions.index`)
  - **Création** : `GET /admin/sessions/create` (nommée `admin.sessions.create`)
  - **Enregistrement** : `POST /admin/sessions` (nommée `admin.sessions.store`)
  - **Détail** : `GET /admin/sessions/{session}` (nommée `admin.sessions.show`)
  - **Édition** : `GET /admin/sessions/{session}/edit` (nommée `admin.sessions.edit`)
  - **Mise à jour** : `PUT /admin/sessions/{session}` (nommée `admin.sessions.update`)
  - **Suppression** : `DELETE /admin/sessions/{session}` (nommée `admin.sessions.destroy`)

## Utilisateur

- **Tableau de bord** : `GET /user` (nommée `user.dashboard`)

## Utilisateurs authentifiés

- **Déconnexion** : `POST /logout` (nommée `user.logout`)
- **Profil** : `GET /profile` (nommée `user.profile`)

## Utilisateurs invités

- **Accueil** : `GET /` (nommée `home`)
- **Connexion** : `GET /login`
- **Authentification** : `POST /login` (nommée `login`)
- **Contact** : `GET /contact`
  