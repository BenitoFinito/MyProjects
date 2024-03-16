using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class RuchKamery : MonoBehaviour
{
    public GameObject bohater;
    
    void Start()
    {
        
    }

    
    void Update()
    {
        Vector3 nowaPozycjaKamery = new Vector3(bohater.transform.position.x,
                bohater.transform.position.y,
               transform.position.z);

        transform.position = nowaPozycjaKamery;

    }
}
