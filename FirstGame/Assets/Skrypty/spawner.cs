using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class spawner : MonoBehaviour
{

    public int los;
    public int[] tab = new int[20];
    public GameObject Klocek;
    public Transform[] miejscaDlaKlockow;
    public int doLos;
    void Start()

    {
        tab[0] = -1;
        for (int i = 0; i < doLos; i++)
        {

            Spawn(21);
        }

    }
    void Update()
    {

    }
    public void Spawn(int p)
    {
        bool k = false;
        Random.seed = Random.Range(1, 100);
        while (true)
        {
            if (tab[los] == los || los==p)
            {
                los = Random.Range(0, miejscaDlaKlockow.Length - 1);
                Random.seed = Random.Range(1, 100);
            }
            else
            {
                GameObject gameObject = Instantiate(Klocek, miejscaDlaKlockow[los].transform.position, Quaternion.identity);
                tab[los] = los;
                k = true;
                break;
            }

        }
    }


}