<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Profiles Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Profile newEmptyEntity()
 * @method \App\Model\Entity\Profile newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Profile> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Profile get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Profile findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Profile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Profile> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Profile|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Profile saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Profile>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Profile>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Profile>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Profile> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Profile>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Profile>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Profile>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Profile> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProfilesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('profiles');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('user_id')
            ->notEmptyString('user_id')
            ->add('user_id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('location')
            ->maxLength('location', 150)
            ->allowEmptyString('location');

        $validator
            ->scalar('website')
            ->maxLength('website', 255)
            ->allowEmptyString('website');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 30)
            ->allowEmptyString('phone');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['user_id']), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
